@extends('admin.layouts.master')

@section('header_scripts')

<link rel="stylesheet" href="https://cdn.datatables.net/u/bs-3.3.6/jqc-1.12.3,dt-1.10.12,af-2.1.2,fh-3.1.2/datatables.min.css">

@stop

@section('content')


    @include('admin.layouts.header')
    <div class="container">
      <div class="l-post-list-page">
            <h1 class="page-title">Componenti AdSense
                <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
            </h1>
  
        <div class="row">
        </div>
        <div class="post-list">
  
          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th data-search-type="text">Identificativo</th>
                <th data-search-type="text">Pagina</th>
                <th data-search-type="text">Mobile</th>
                <th data-search-type="text">Visualizza</th>
                <th data-search-type="none">Azioni</th>
              </tr>
            </thead>

            <tbody>
              @foreach($ads as $ad)
              <tr class="article-list-row">
                <td><a href="/admin/ads/{{$ad->id}}/modifica">{{$ad->description}} ({{$ad->name}})</a></td>

                <td class="article-list-category">{{$ad->page}}</td>
                <td class="article-list-category">{{($ad->is_mobile) ? 'si' : 'no'}}</td>
                <td class="article-list-category">{{($ad->active) ? 'si' : 'no'}}</td>
                <td class="actions">
                  <a href="/admin/ads/{{$ad->id}}/modifica" class="action"><i class="fa fa-edit fa-fw"></i></a>
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

