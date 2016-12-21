@extends('layouts.master')

@section('header_scripts')
<link rel="stylesheet" href="/css/bootstrap-select.min.css">
<link rel="stylesheet" href="/css/select2.min.css">


    <link rel="stylesheet" href="/bower_components/bootstrap-fileinput/css/fileinput.css">

@stop

@section('content')

    <!-- <div class="page-bg news-bg"></div> -->
    @include('layouts.header')
    <div class="container">
      <form  method="POST" role="form" action="/admin/articoli/{{$article->id}}" enctype="multipart/form-data">
      <div class="l-create-post-page">
        <h1 class="page-title">Modifica articolo: '{{$article->title}}'</h1>
        @include('errors.errors')
        <div class="row">
        <form action="/dashboard/articoli/{{$article->id}}" method="POST" enctype="multipart/form-data">
          <div class="col-sm-8">
               {{csrf_field()}}
               <input type="hidden" name="article_id" value="{{$article->id}}">
              <div class="form-group">
                <input type="text" placeholder="Titolo" name="title"  value="{{old('title', $article->title)}}" required="required" class="form-control">
              </div>
              <div class="form-group">
                <textarea name="description" placeholder="Breve descrizione" cols="30" rows="5" class="form-control" required>{{old('description', $article->description)}}</textarea>
              </div>
              <div class="form-group">
                <textarea name="body" id="body" placeholder="Scrivi Il tuo articolo" cols="30" rows="15" class="form-control" required>{!!old('body', $article->body)!!}</textarea>
              </div>
              <div class="form-group">
                            <div class="row">
                              <div class="col-xs-12"><button type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-save"></i> Salva</button></div>
                             
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
                    <input type="file" name="article-featured-image" class="file-loading" id="article-featured-image">
                  </div>
                </div>
              </div>
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


      <script>
          $('textarea#body').ckeditor();
          $("#article-featured-image").fileinput(
              {
                'browseClass': "btn btn-primary btn-block",
                'language': "it",
                'showCaption': false,
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
                   // 'maxImageWidth': 250,
                   // 'maxImageHeight': 250,
                'minImageWidth': 730,
                'minImageHeight': 350,
              }
            );
      </script>

      <script>
        $(".tag-select").select2({
          tags: true,
          language: "it"
        })
      </script>


      @stop