@extends('layouts.master')
@section('header_scripts')
<link rel="stylesheet" href="/css/sweetalert.css">

<meta name="_token" content="{{ csrf_token() }}" />
@stop
@section('content')
@if($ads['background_dashboard']->active)
    <div class="page-bg news-bg">{!!$ads['background_dashboard']->content!!}</div>

      @endif
@include('layouts.header')
<div class="container">
  <div class="l-post-list-page">

    <h1 class="page-title">Riepilogo / Richiedi pagamento
    <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
    </h1>

    <div class="post-list">

      <table class="table table-bordered article-list-table">
        <thead>
          <tr>
            <th>Mese</th>
            <th>Visite</th>
            <th>Totale</th>
            <th>Stato</th>
          </tr>
        </thead>
        <tbody>
          <?php $total_payoff = 0; ?>
          @foreach($visits as $month => $visit)
          <tr class="article-list-row">
            <td>{{date('m/Y', strtotime($month))}}</td>
            <td>{{$visit['visits']}}</td>
            <td class="article-list-state">€&nbsp;{{number_format($visit['payoff'], 3, ',', '.')}}</td>
            <td>@if($visit['status']) <span class="status-{{$visit['status-slug']}}">{{$visit['status']}}</span> @else <a href="#" class="btn btn-primary request-payment-button" data-payload="{{base64_encode($month)}}">Richiedi Pagamento</a>@endif</td>
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
