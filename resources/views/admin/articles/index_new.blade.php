@extends('admin.layouts.master')

@section('header_scripts')

<link rel="stylesheet" href="https://cdn.datatables.net/u/bs-3.3.6/jqc-1.12.3,dt-1.10.12,af-2.1.2,fh-3.1.2/datatables.min.css">

@stop

@section('content')

    <!-- <div class="page-bg news-bg holderjs"></div> -->
    @include('admin.layouts.header')
    <div class="container">
      <div class="l-post-list-page">

        <h1 class="page-title">Articoli in coda ({{count($new)}})
            <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
        </h1>
        <div class="row">
        </div>
        <div class="post-list">
     {{--      <div class="row">
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
              <label class="label">Reset</label><a class="btn btn-default btn-md btn-block article-list-reset-filter"><i class="fa fa-close"></i> Azzera filtri</a>
            </div>
          </div> --}}
          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th data-search-type="text">Data</th>
                <th data-search-type="text">Titolo</th>
                <th data-search-type="multiple">Categoria</th>
                <th data-search-type="multiple">Utente</th>
                <th data-search-type="none">Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach($new as $article)
              <tr class="article-list-row">
                <td>{{$article->updated_at->format('d-m-Y H:i')}}</td>
                <td><a href="/admin/articoli/{{$article->id}}">{{$article->title}}</a></td>
                <td class="article-list-category">{{$article->category->name}}</td>
                <td class="article-list-category"><a href="{{$article->user->present()->user_url()}}" class="author">
                            <i class="fa fa-user fa-fw"></i>{{$article->user->present()->user_name()}}</a></td>
                <td>
                  <a href="/admin/articoli/{{$article->id}}/modifica" class="action"><i class="fa fa-edit fa-fw"></i></a><a href="/admin/articoli/{{$article->id}}/rimuovi" class="action"><i class="fa fa-trash-o fa-fw"></i></a>
                    <a href="/admin/articoli/{{$article->id}}/anteprima" class="action"><i class="fa fa-eye fa-fw"></i></a>
                    <!-- <a href="{{$article->present()->article_url()}}" target="_blank" class="action"><i class="fa fa-check fa-fw"></i></a> -->
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
