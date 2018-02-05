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

        <h1 class="page-title">Categorie ({{count($categories)}})
            <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
        </h1>
        @include('table-legend')
        <div class="post-list">

          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th data-search-type="text">Nome</th>
                <th data-search-type="text">Articoli</th>
                <th data-search-type="text">Payoff x 1000</th>
                <th data-search-type="text">Visite</th>
                <th data-search-type="text">Payoff Generato</th>
                <th data-search-type="none">Azioni</th>
              </tr>
            </thead>

            <tbody>
              @foreach($categories as $category)
              <tr class="article-list-row">
                <td><a href="/admin/categorie/{{$category->id}}/modifica">{{$category->name}}</a></td>
                <td class="article-list-category">{{count($category->articles)}}</td>
                <td class="article-list-category">€{{number_format($category->payoff, 2, ',', '.')}}</td>

                <td class="article-list-category">{{array_sum(array_pluck($category->articles, 'view_counter'))}}</td>
                <td class="article-list-category">€{{number_format(array_sum(array_pluck($category->articles, 'payoff_counter')), 2, ',', '.')}}</td>
                <td class="actions">
                  <a href="/admin/categorie/{{$category->id}}/modifica" class="action"><i class="fa fa-edit fa-fw"></i></a>
                  @if(count($category->articles) == 0)
                    <a href="#" class="action category-delete-trigger" data-category-id="{{$category->id}}"><i class="fa fa-trash-o fa-fw"></i></a>
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
  <script src="/js/sweetalert.min.js"></script>

<script>
  $('.category-delete-trigger').click(function(){

    var id = $(this).data('category-id');

      swal({
        title: "Sei sicuro di voler rimuovere questa categoria?",
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
            swal("Fatto!", "Questa categoria è stata rimossa.", "success");
            ajaxCall(3, 'categorie/' + id + '/rimuovi', 'POST', false, goto('/admin/categorie'));
          } else {
            swal("Interroto", "La categoria non è stata cancellata", "error");
          }
        });

        });
</script>

@stop
