@extends('layouts.master')


@section('header_scripts')

<link rel="stylesheet" href="https://cdn.datatables.net/u/bs-3.3.6/jqc-1.12.3,dt-1.10.12,af-2.1.2,fh-3.1.2/datatables.min.css">

@stop

@section('content')
@if($ads['background_dashboard']->active)
    <div class="page-bg news-bg">{!!$ads['background_dashboard']->content!!}</div>

      @endif
    @include('layouts.header')
    <div class="container">
      <div class="l-profile-settings-page">
        <h1 class="page-title">Impostazioni</h1>
        <div role="tab-panel" class="profile-settings-panel">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Profilo</a></li>
            @if(strlen($user->facebook_id) < 1)
              <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Password</a></li>
            @endif
            <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Metodi Di Pagamento</a></li>
            <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Utenti che seguo</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab1" role="tabpanel" class="tab-pane active">
              @include('dashboard.partials.profile_form')
            </div>

            @if(strlen($user->facebook_id) < 1)

            <div id="tab2" role="tabpanel" class="tab-pane">
            
              @include('dashboard.partials.password_form')
            </div>

            @endif
            <div id="tab3" role="tabpanel" class="tab-pane">
              
              @include('dashboard.partials.paymethod_form')
            </div>
            <div id="tab4" role="tabpanel" class="tab-pane">
              
              @include('dashboard.partials.people_i_follow')
            </div>
          </div>
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