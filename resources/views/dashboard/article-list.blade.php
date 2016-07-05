@extends('layouts.master')

@section('header_scripts')
<link rel="stylesheet" href="/css/sweetalert.css">

<meta name="_token" content="{{ csrf_token() }}" />

@stop

@section('content')

    <div class="page-bg news-bg holderjs"></div>
    @include('layouts.header')
    <div class="container">
      <div class="l-post-list-page">
          
        <h1 class="page-title">I miei articoli 
            <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
        </h1>
        <div class="row">
        </div>
        <div class="post-list">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="label">Categorie</label>
                 <select class="form-control" id="dashboard-category-filter">
                     <option class="dashboard-category-filter-option" value="all">Tutte</option>
                  @foreach($categories as $category)
                     <option class="dashboard-category-filter-option" value="{{$category}}">{{$category}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="label">Stato</label>
                <select class="form-control" id="dashboard-state-filter">
                  <option value="all">Tutte</option>
                  <option value="Bozza">Bozza</option>
                  <option value="In Approvazione">In Approvazione</option>
                  <option value="Pubblicato">Pubblicato</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <label class="label">Reset</label><a class="btn btn-default btn-md btn-block article-list-reset-filter"><i class="fa fa-close"></i> Azzera filtri</a>
            </div>
          </div>
          <table class="table table-bordered article-list-table">
            <thead>
              <tr>
                <th>Data</th>
                <th>Titolo</th>
                <th>Categoria</th>
                <th>Stato</th>
                <th>Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user->all_articles as $article)
              <tr class="article-list-row">
                <td>{{$article->created_at->format('d-m-Y')}}</td>
                <td>{{$article->title}}</td>
                <td class="article-list-category">{{$article->category->name}}</td>
                <td class="article-list-state">{{$article->status->name}}</td>
                <td>
                  @if($article->status->id == 1)
                  <a href="/dashboard/articoli/{{$article->id}}/modifica" class="action"><i class="fa fa-edit fa-fw"></i></a>
                  <a href="#" data-article-id="{{$article->id}}" class="action remove-button"><i class="fa fa-trash-o fa-fw"></i></a>
                  @else
                    <a href="/dashboard/articoli/{{$article->id}}/anteprima" target="_blank" class="action"><i class="fa fa-eye fa-fw"></i></a>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @stop

    @section('footer_scripts')
  <script src="/js/bootstrap-select.min.js"></script>
  
  <script> $('.cat-select').selectpicker();</script>
  
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

    <script src="/bower_components/bootstrap-fileinput/js/fileinput.js"></script>
  <script src="/bower_components/bootstrap-fileinput/js/fileinput_locale_it.js"></script>
  <script src="/js/sweetalert.min.js"></script>



      <script>
         
          $('.remove-button').click(function(event){
            event.preventDefault();
            var id = $(this).data('article-id');
            console.log(id);
              swal({   
                title: "Sei sicuro di voler cancellare permanentemente questo articolo?",   
                text: "Non sarà più possibile disfare quest'azione.",   
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
                    swal("Rimosso!", "Questo Articolo è stato cancellato.", "success");   
                    ajaxCallFront(id, '/dashboard/articoli', 'DELETE', false, goto('/dashboard'));
                  } else {     
                    swal("Cancelled", "Your imaginary file is safe :)", "error");   
                  } 
                });
          })
      </script>


      @stop