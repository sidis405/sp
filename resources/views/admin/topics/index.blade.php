@extends('admin.layouts.master')

@section('header_scripts')

<link rel="stylesheet" href="/css/sweetalert.css">

<meta name="_token" content="{{ csrf_token() }}" />


@stop

@section('content')

    <!-- <div class="page-bg news-bg holderjs"></div> -->
    @include('admin.layouts.header')
    <div class="container">
      <div class="l-post-list-page">

        <h1 class="page-title">Argomenti del giorno
        <span class="pull-right"><a href="/admin/argomenti/crea"><i class="fa fa-plus-circle fw"></i></a></span>
        </h1>
        @include('table-legend')
        <div class="post-list">

          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th data-search-type="text">Nome</th>
                <th data-search-type="text">Descrizione</th>
                <th data-search-type="text">In Data</th>
                <th data-search-type="text">Attivo</th>
                <th data-search-type="none">Azioni</th>
              </tr>
            </thead>

            <tbody>
              @foreach($topics as $topic)
              <tr class="article-list-row">
                <td><a href="/admin/argomenti/{{$topic->id}}/modifica">{{$topic->name}}</a></td>
                <td class="article-list-topic">{{$topic->description}}</td>
                <td class="article-list-topic">{{$topic->ondate->format('d M y')}}</td>
                <td class="article-list-topic">{{($topic->active == "1") ? 'Si' : 'No'}}</td>
                <td class="actions">
                  <a href="/admin/argomenti/{{$topic->id}}/modifica" class="action"><i class="fa fa-edit fa-fw"></i></a>
                  <a href="#" class="action topic-delete-trigger" data-topic-id="{{$topic->id}}"><i class="fa fa-trash-o fa-fw"></i></a>
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
  <script src="/js/sweetalert.min.js"></script>

<script>
  $('.topic-delete-trigger').click(function(event){

    event.preventDefault();

    var id = $(this).data('topic-id');

      swal({
        title: "Sei sicuro di voler rimuovere questa argomento?",
        text: "Non sarà possibili recuperare questo dato",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, rimuovi!",
        cancelButtonText: "No, ho cambiato idea!",
        closeOnConfirm: false,
        closeOnCancel: true
      },
        function(isConfirm){
          if (isConfirm) {
            swal("Fatto!", "Questa argomento è stata rimossa.", "success");
            ajaxCall(3, 'argomenti/' + id + '/rimuovi', 'GET', false, goto('/admin/argomenti'));
          } else {
            swal("Interroto", "L'argomento non è stato cancellato", "error");
          }
        });

        });
</script>

@stop
