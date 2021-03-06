@extends('layouts.master')

@section('header_scripts')
<link rel="stylesheet" href="/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="/bower_components/bootstrap-fileinput/css/fileinput.css">

@stop

@section('content')

    @if($ads['background_dashboard']->active)
    <div class="page-bg news-bg">{!!$ads['background_dashboard']->content!!}</div>

      @endif
    @include('layouts.header')
    <div class="container">
      <form  method="POST" role="form" action="/dashboard/articoli" enctype="multipart/form-data">
      <div class="l-create-post-page">
        <h1 class="page-title">Scrivi Nuovo Articolo</h1>
        @include('errors.errors')
        <div class="row">
        <form action="/dashboard/articoli" method="POST" enctype="multipart/form-data">
          <div class="col-sm-8">
               {{csrf_field()}}
              <div class="form-group">
                <input type="text" id="count-me-title" placeholder="Titolo: Minimo 25, massimo 80 caratteri" maxlength="80" name="title"  value="{{old('title')}}" required="required" class="form-control count-me">
              </div>
              <div class="form-group">
                <textarea name="description"  id="count-me-description"  placeholder="Breve descrizione: Minimo 80, massimo 160 caratteri" maxlength="160" cols="30" rows="5" class="form-control count-me" required>{{old('description')}}</textarea>
              </div>
              <div class="form-group">
                <textarea name="body" id="body" placeholder="Scrivi Il tuo articolo" cols="30" rows="15" class="form-control" required placeholder="Massimo {{$siteSettings->article_maxlength}} caratteri">{!!old('body')!!}</textarea>
              </div>
              <div class="form-group">
                <textarea name="notes" placeholder="(non obbligatorio) Riferimenti e note" maxlength="300" cols="30" rows="5" class="form-control">{{old('notes')}}</textarea>
              </div>
              <div class="form-group">
                            <div class="row">
                              <div class="col-xs-12"><button type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-save"></i> Salva bozza</button></div>
                            </div>
                          </div>
          </div>
          <div class="col-sm-4">
            <p>Seleziona una categoria:</p>

            <select name="category_id" class="cat-select">
              @foreach($categories as $category)
                <option value="{{$category->id}}" class="{{$category->color}}" data-class="{{$category->color}}">{{$category->name}}</option>
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
                    <span>**Campo obbligatorio**</span>
                    <input type="file" name="article-featured-image" class="file-loading" id="article-featured-image" required="">
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
  <script> $('.cat-select').selectpicker();</script>
  <script src="/js/jquery-character-counter.js"></script>


  <script type="text/javascript">
    $("#count-me-title").characterCounter({
      limit: $(this).attr('maxlength')  ,
      counterWrapper: 'span',
      counterCssClass: 'btn',
      counterFormat: '%1 caratteri rimasti'
    });

    $("#count-me-description").characterCounter({
      limit: $(this).attr('maxlength')  ,
      counterWrapper: 'span',
      counterCssClass: 'btn',
      counterFormat: '%1 caratteri rimasti'
    });
  </script>

  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

    <script src="/bower_components/bootstrap-fileinput/js/fileinput.js"></script>
  <script src="/bower_components/bootstrap-fileinput/js/fileinput_locale_it.js"></script>


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
                showParagraphs: false,

                // Maximum allowed Word Count
                maxWordCount: 20000,

                // Maximum allowed Char Count
                countSpacesAsChars: true,
                maxCharCount: {{$siteSettings->article_maxlength}},
                minCharCount: {{$siteSettings->article_minlength}}
            }
          });
          $("#article-featured-image").fileinput(
              {
                'browseClass': "btn btn-primary btn-block",
                'language': "it",
                'showCaption': false,
                'maxFileCount': 1,
                'browseLabel': 'Scegli immagine',
                'showRemove': false,
                'showUpload': false,
                'previewFileType':'image',

                'initialPreviewAsData': true,
                'initialPreviewConfig': [
                            {caption: "Immagine di Copertina", size: 930321, width: "120px", key: 1}
                        ],
                'overwriteInitial': true,
                'maxFileSize': 1024,
                'allowedFileExtensions': ["jpg", "png"]
              }
            );
      </script>


      @stop
