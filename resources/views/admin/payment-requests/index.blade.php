@extends('layouts.master')
@section('header_scripts')
<link rel="stylesheet" href="/css/sweetalert.css">

<meta name="_token" content="{{ csrf_token() }}" />
@stop
@section('content')

@include('layouts.header')
<div class="container">
  <div class="l-post-list-page">
    
    <h1 class="page-title">Riepilogo Richiste pagamento
    <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
    </h1>

    <div class="post-list">
      
      <table class="table table-bordered article-list-table">
        <thead>
          <tr>
            <th>Utente</th>
            <th>Mese</th>
            <th>Totale</th>
            <th>Stato</th>
          </tr>
        </thead>
        <tbody>
          @foreach($requests as $p_request)
          <tr class="article-list-row">
            <td><a href="{{$p_request->user->present()->user_url()}}">{{$p_request->user->present()->user_name()}}</a></td>
            <td>{{date('m/Y', strtotime($p_request->timestamp))}}</td>
            <td class="article-list-state">€&nbsp;{{number_format($p_request->amount, 3, ',', '.')}}</td>
            <td>
              <span class="status-{{$p_request->status['status-slug']}}">{{$p_request->status['name']}} &nbsp;</span> 
              <a href="/admin/pagamenti/{{$p_request->id}}" class="action">
              <i class="fa fa-eye fa-fw"></i>
              </a>
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
         
          $('.request-payment-button').click(function(event){
            event.preventDefault();
            var item = $(this);
            var payload = $(this).data('payload');

              swal({   
                title: "Sei sicuro di voler richiedere il pagamento per il mese selezionato?",   
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
                    swal("Ok!", "Richiesta inviata.", "success");   
                    ajaxCallFront(payload, '/riepilogo-pagamenti', 'POST', false, false);
                    item.html('<span class="status-in-attesa">In Attesa</span>');
                    item.removeClass('request-payment-button');
                    item.removeClass('btn');
                    item.removeClass('btn-primary');
                    item.css('text-transform', 'none');
                  } else {     
                    swal("Cancelled", "Your imaginary file is safe :)", "error");   
                  } 
                });
          })
      </script>

@stop