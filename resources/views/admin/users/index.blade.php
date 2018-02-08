@extends('admin.layouts.master')

@section('header_scripts')

<link rel="stylesheet" href="https://cdn.datatables.net/u/bs-3.3.6/jqc-1.12.3,dt-1.10.12,af-2.1.2,fh-3.1.2/datatables.min.css">

@stop

@section('content')

    <!-- <div class="page-bg news-bg holderjs"></div> -->
    @include('admin.layouts.header')
    <div class="container">
      <div class="l-post-list-page">

        <h1 class="page-title">Utenti ({{count($users)}})
            <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
        </h1>
        @include('user-table-legend')
        <div class="post-list">

          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th data-search-type="text">&nbsp;</th>
                <th data-search-type="text">Nome</th>
                <th data-search-type="text">Cognome</th>
                <th data-search-type="text">Nickname</th>
                <th data-search-type="text">Email</th>
                <th data-search-type="multiple">Stato</th>
                <th data-search-type="text">Articoli</th>
                <th data-search-type="text">Payoff</th>
                <th data-search-type="none">Azioni</th>
              </tr>
            </thead>

            <tbody>
              @foreach($users as $user)
              <tr class="article-list-row">
                <td class="article-list-category"><a href="/admin/utenti/{{$user->id}}" class="action"><img src="{{$user->avatar}}" class="img-responsive"/></a></td>
                <td class="article-list-category">{{$user->name}}</td>
                <td class="article-list-category">{{$user->surname}}</td>
                <td class="article-list-category">{{$user->username}}</td>
                <td class="article-list-category">{{$user->email}}</td>
                <td class="article-list-category">
                  @if($user->active == 1)
                  Attivo
                  @else Non Attivo @endif</td>
                <td class="article-list-category">{{count($user->articles)}}</td>
                <td class="article-list-category">€{{number_format(array_sum(array_pluck($user->all_articles, 'payoff_counter')), 3, ',', '.')}}</td>
                <td class="actions">
                  <a href="/admin/utenti/{{$user->id}}" class="action"><i class="fa fa-bar-chart fa-fw"></i></a>
                  @if($user->blocked == 0)
                    <a onClick="return confirm('Sei sicuro di volere bloccare questo utente?')" href="/admin/utenti/{{$user->id}}/1" class="action ban"><i class="fa fa-ban fa-fw"></i></a>
                  @elseif($user->blocked == 1)
                    <a onClick="return confirm('Sei sicuro di volere sbloccare questo utente?')" href="/admin/utenti/{{$user->id}}/0" class="action ban"><i class="fa fa-check"></i></a>
                  @endif
                  <a onClick="return confirm('Sei sicuro di volere cancellare PERMANENTEMENTE questo utente?')" href="/admin/utenti/cancella/{{$user->id}}" class="action ban"><i class="fa fa-trash"></i></a>
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
