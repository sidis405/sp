@extends('layouts.master')

@section('header_scripts')
<link rel="stylesheet" href="/css/bootstrap-select.min.css">
<link rel="stylesheet" href="/css/sweetalert.css">
<link rel="stylesheet" href="/css/select2.min.css">


<meta name="_token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="/bower_components/bootstrap-fileinput/css/fileinput.css">

@stop

@section('content')

    @if($ads['background_dashboard']->active)
    <div class="page-bg news-bg">{!!$ads['background_dashboard']->content!!}</div>

      @endif
    @include('layouts.header')
    <div class="container">
      <form  method="POST" role="form" action="/dashboard/articoli/{{$article->id}}" enctype="multipart/form-data">
      <div class="l-create-post-page">
        <h1 class="page-title">Modifica articolo: '{{$article->title}}'</h1>
        @include('errors.errors')
        <div class="row">
        <form action="/dashboard/articoli/{{$article->id}}" method="POST" enctype="multipart/form-data">
          <div class="col-sm-8">
               {{csrf_field()}}
               <input type="hidden" name="article_id" value="{{$article->id}}">
              <div class="form-group">
                <input type="text" placeholder="Titolo: Minimo 25, massimo 75 caratteri" maxlength="75" name="title"  value="{{old('title', $article->title)}}" required="required" class="form-control">
              </div>
              <div class="form-group">
                <textarea name="description" placeholder="Breve descrizione: Minimo 80, massimo 130 caratteri" maxlength="130" cols="30" rows="5" class="form-control" required>{{old('description', $article->description)}}</textarea>
              </div>
              <div class="form-group">
                <textarea name="body" id="body" placeholder="Scrivi Il tuo articolo" cols="30" rows="15" class="form-control" required>{!!old('body', $article->body)!!}</textarea>
              </div>
              <div class="form-group">
                <textarea name="notes" placeholder="(non obligatorio) Riferimenti e note" maxlength="80" cols="30" rows="5" class="form-control">{{old('description', $article->notes)}}</textarea>
              </div>
              <div class="form-group">
                            <div class="row">
                              <div class="col-xs-6"><button type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-save"></i> Salva bozza</button></div>
                              <div class="col-xs-6"><a href="/dashboard/articoli/{{$article->id}}/anteprima" target="_blank" class="btn btn-default btn-lg btn-block"><i class="fa fa-eye"></i> Anteprima</a></div>
                            </div>
                          </div>
          </div>
          <div class="col-sm-4">
            <p>Seleziona una categoria:</p>

            <select name="category_id" class="cat-select"  data-style="{{$article->category->color}}">
              @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $article->category->id) selected @endif class="{{$category->color}}" data-class="{{$category->color}}">{{$category->name}}</option>
              @endforeach
            </select>

            <p>Aggiungi tag:</p>
            <select name="tags[]" class="tag-select form-control" multiple>
              @foreach($tags as $tag)
                <option value="{{$tag->tag}}" @if(in_array($tag->id ,array_pluck($article->tags, 'id'))) selected @endif>{{$tag->tag}}</option>
              @endforeach
            </select>

            <div class="form-group">
              <div class="row">
                <div class="col-xs-12" style="display:none;">
                  <div class="btn-upload-image-container">
                    <a class="btn btn-default btn-lg btn-block btn-upload btn-upload-image" onClick="$('#article-featured-image').trigger('click');">
                      <i class="fa fa-camera"></i> Carica foto
                    </a>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="btn-upload-image-container">
                    <input type="file" name="article-featured-image" class="file-loading" id="article-featured-image" required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="social-share"><a type="submit" class="btn btn-default btn-block"><i class="fa fa-facebook"></i> Share on Facebook</a><a type="submit" class="btn btn-default btn-block"><i class="fa fa-twitter"></i> Share on Twitter</a><a type="submit" class="btn btn-default btn-block"><i class="fa fa-google"></i> Share on Google+</a></div>
            
            <div class="form-group">
              <a  class="btn btn-primary btn-lg pull-right col-sm-12 approve-button"><i class="fa fa-paper-plane"></i> Invia per approvazione</a>
              <div class="clearfix"></div>
            </div>
          </div>
          </form>
        </div>
      </div>
            </form>
      
    </div>
  @stop

  @section('footer_scripts')
  <script src="/js/bootstrap-select.min.js"></script>
  <script src="/js/select2.min.js"></script>

  
  <script> $('.cat-select').selectpicker();</script>
  
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

    <script src="/bower_components/bootstrap-fileinput/js/fileinput.js"></script>
  <script src="/bower_components/bootstrap-fileinput/js/fileinput_locale_it.js"></script>
  <script src="/js/sweetalert.min.js"></script>



      <script>
          $('textarea#body').ckeditor({
            // filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            // filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            // filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
            wordcount : {

                // Whether or not you want to show the Word Count
                showWordCount: false,

                // Whether or not you want to show the Char Count
                showCharCount: true,
                
                // Maximum allowed Word Count
                maxWordCount: 20000,

                // Maximum allowed Char Count
                 // Maximum allowed Char Count
                maxCharCount: {{$siteSettings->article_maxlength}},
                minCharCount: {{$siteSettings->article_minlength}}
            }
          });
          $("#article-featured-image").fileinput(
              {
                'browseClass': "btn btn-primary btn-block",
                'language': "it",
                'showCaption': false,
                'browseLabel': 'Scegli immagine',
                'maxFileCount': 1,
                'showRemove': false,
                'showUpload': false,
                'previewFileType':'image',
                'initialPreview': [
                          "<img src='{{$article->present()->article_image_url()}}' class='img-responsive'>",
                        ],
                'initialPreviewAsData': true,
                'initialPreviewConfig': [
                            {caption: "Immagine di Copertina", size: 930321, width: "120px", key: 1}
                        ],
                'overwriteInitial': true,
                'maxFileSize': 500,
                'allowedFileExtensions': ["jpg", "png"],
                   'maxImageWidth': 400,
                   'maxImageHeight': 250,
                'minImageWidth': 400,
                'minImageHeight': 250,
              }
            );

          $('.approve-button').click(function(){
              swal({   
                title: "Sei sicuro di voler inviare per approvazione questo articolo?",   
                text: "Non sarà più possibile fare modifiche aggiuntive.",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Si, invia!",   
                cancelButtonText: "No, ho cambiato idea!",   
                closeOnConfirm: false,   
                closeOnCancel: true 
              }, 
                function(isConfirm){   
                  if (isConfirm) {     
                    swal("Inviato!", "Questo Articolo è stato inviato.", "success");   
                    ajaxCallFront(2, '/dashboard/articoli/{{$article->id}}/invia', 'POST', false, goto('/dashboard'));
                  } else {     
                    swal("Cancelled", "Your imaginary file is safe :)", "error");   
                  } 
                });
          })

          $(".tag-select").select2({
            tags: true,
            language: "it"
          })
      </script>


      @stop