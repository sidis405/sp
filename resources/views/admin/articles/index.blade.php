@extends('admin.layouts.master')

@section('header_scripts')

<link rel="stylesheet" href="https://cdn.datatables.net/u/bs-3.3.6/jqc-1.12.3,dt-1.10.12,af-2.1.2,fh-3.1.2/datatables.min.css">

@stop

@section('content')

    <div class="page-bg news-bg holderjs"></div>
    @include('admin.layouts.header')
    <div class="container">
      <div class="l-post-list-page">
          
        <h1 class="page-title">Articoli ({{count($articles)}})
            <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
        </h1>
        <div class="row">
        </div>
        <div class="post-list">
  
          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th>Data</th>
                <th>Titolo</th>
                <th>Categoria</th>
                <th>Utente</th>
                <th>Visite</th>
                <th>Azioni</th>
              </tr>
            </thead>

            <tbody>
              @foreach($articles as $article)
              <tr class="article-list-row">
                <td>{{$article->updated_at->format('d-m-Y H:i')}}</td>
                <td><a href="/admin/articoli/{{$article->id}}">{{$article->title}}</a></td>
                <td class="article-list-category">{{$article->category->name}}</td>
                <td class="article-list-category"><a href="{{$article->user->present()->user_url()}}" class="author">
                <i class="fa fa-user fa-fw"></i>{{$article->user->present()->user_name()}}</a></td>
                <td class="article-list-category"><i class="fa fa-user fa-fw"></i>{{$article->view_counter}}</a></td>
                <td>
                  <a href="/admin/articoli/{{$article->id}}/modifica" class="action"><i class="fa fa-edit fa-fw"></i></a><a href="/dashboard/articoli/{{$article->id}}/rimuovi" class="action"><i class="fa fa-trash-o fa-fw"></i></a>
                    <a href="/admin/articoli/{{$article->id}}/anteprima" class="action"><i class="fa fa-eye fa-fw"></i></a>
                    <!-- <a href="{{$article->present()->article_url()}}" target="_blank" class="action"><i class="fa fa-check fa-fw"></i></a> -->
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Data</th>
                <th>Titolo</th>
                <th>Categoria</th>
                <th>Utente</th>
                <th>Visite</th>
                <th>Azioni</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  @stop

  @section('footer_scripts')

  <script src="https://cdn.datatables.net/u/bs-3.3.6/jqc-1.12.3,dt-1.10.12,af-2.1.2,fh-3.1.2/datatables.min.js"></script>
  <script>
      
      $(document).ready(function() {
         $('#datatable thead th').each( function () {
                 var title = $('#datatable tfoot th').eq( $(this).index() ).text();
                 $(this).html( '<input type="text" placeholder="Cerca '+title+'"/>' );
             } );
          
             // DataTable
             var table = $('#datatable').DataTable({
              "iDisplayLength": 50
             });
          
             // Apply the search
             table.columns().eq( 0 ).each( function ( colIdx ) {
                 $( 'input', table.column( colIdx ).header() ).on( 'keyup change', function () {
                     table
                         .column( colIdx )
                         .search( this.value )
                         .draw();
                 } );
             } );
         } );


  </script>
  @stop