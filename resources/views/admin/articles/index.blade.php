@extends('admin.layouts.master')

@section('header_scripts')

<link rel="stylesheet" href="https://cdn.datatables.net/u/bs-3.3.6/jqc-1.12.3,dt-1.10.12,af-2.1.2,fh-3.1.2/datatables.min.css">

@stop

@section('content')

    <!-- <div class="page-bg news-bg holderjs"></div> -->
    @include('admin.layouts.header')
    <div class="container">
      <div class="l-post-list-page">

        <h1 class="page-title">Articoli ({{count($articles)}})
            <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
        </h1>
          @include('table-legend')


        <div class="post-list">


          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th data-search-type="text">Data</th>
                <th data-search-type="text">Titolo</th>
                <th data-search-type="multiple">Categoria</th>
                <th data-search-type="multiple">Utente</th>
                <th data-search-type="multiple">Stato</th>
                <th data-search-type="text">Visite</th>
                <th data-search-type="noen">Guadagni</th>
                <th data-search-type="text">Ads</th>
                <th data-search-type="none">Azioni</th>
              </tr>
            </thead>

            <tbody>
              @foreach($articles as $article)
              <tr class="article-list-row">
                <td>{{$article->updated_at->format('d/m/Y')}}</td>
                <td><a href="/admin/articoli/{{$article->id}}">{{$article->title}}</a></td>
                <td class="article-list-category">{{$article->category->name}}</td>
                <td class="article-list-category">
                  {{$article->user->present()->user_name()}}

                </td>
                <td class="article-list-category">
                  {{$article->status->name}}

                </td>
                <td class="article-list-category"><i class="fa fa-user fa-fw"></i>{{$article->view_counter}}</a></td>
                <td class="article-list-category">&euro; {{$article->payoff_counter}}</a></td>
                <td class="article-list-category">{{ ($article->ads) ? 'si' : 'no'}}</a></td>
                <td class="actions">
                  <a href="/admin/articoli/{{$article->id}}/modifica" class="action" title="Modifica"><i class="fa fa-edit fa-fw"></i></a>
                    <a href="/admin/articoli/{{$article->id}}/anteprima" class="action"  title="Preview"><i class="fa fa-eye fa-fw"></i></a>
                    <a onClick="return confirm('Sei sicuro di volere cancellare PERMANENTEMENTE questo articoli? TUTTI i dati andranno PERSI.')" href="/admin/articoli/{{$article->id}}/rimuovi" class="action ban"  title="Cancella"><i class="fa fa-trash"></i></a>
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

  <script src="https://cdn.datatables.net/u/bs-3.3.6/jqc-1.12.3,dt-1.10.12,af-2.1.2,fh-3.1.2/datatables.min.js"></script>

  <script>

        $(document).ready(function() {
            $('#datatable').DataTable( {
                initComplete: function () {
                    var headers = $('#datatable thead th');
                    this.api().columns().every( function (index) {

                    if($(headers[index]).data('search-type') == 'multiple'){

                          var column = this;
                          var select = $('<select><option value=""></option></select>')
                              .appendTo( $(column.header()).empty() )
                              .on( 'change', function () {
                                  var val = $.fn.dataTable.util.escapeRegex(
                                      $(this).val()
                                  );

                                  column
                                      .search( val ? '^'+val+'$' : '', true, false )
                                      .draw();
                              } );

                          column.data().unique().sort().each( function ( d, j ) {
                              select.append( '<option value="'+d+'">'+d+'</option>' )
                          } );

                        }

                      }


                    );
                },
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tutti"]],
                        "iDisplayLength": 25,
                        "language": {
                                       "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Italian.json"
                                   }
            } );
        } );



  </script>
  @stop
