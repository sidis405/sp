@extends('layouts.master')
@section('header_scripts')
<link rel="stylesheet" href="/css/sweetalert.css">

<meta name="_token" content="{{ csrf_token() }}" />
@stop
@section('content')

@include('layouts.header')
<form action="/admin/pagamenti/{{$payment_request->id}}" method="POST">
@include('errors.errors')
<input type="hidden" name="payment_status_id" value="1">
{{ csrf_field() }}
<div class="container">
  <div class="l-post-list-page">
    
    <h1 class="page-title">Dettaglio Richista pagamento
    <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
    </h1>

    <div class="post-list">
      
      <table class="table table-bordered article-list-table">
        <tbody>
        <tr>
          <td>Utente</td>
          <td><a href="{{$payment_request->user->present()->user_url()}}">{{$payment_request->user->present()->user_name()}}</a></td>
        </tr>
        <tr>
          <td>Periodo</td>
          <td>{{date('m/Y', strtotime($payment_request->timestamp))}}</td>
        </tr>
        <tr>
          <td>Importo</td>
          <td class="article-list-state">€&nbsp;{{number_format($payment_request->amount, 3, ',', '.')}}</td>
        </tr>

        @if($payment_request->user->payment_paypal == "1")

        <tr>
          <td>Metodo di pagamento</td>
          <td>Paypal</td>
        </tr>

        <tr>
          <td>Conto paypal</td>
          <td>{{$payment_request->payment_detail_paypal_email}}</td>
        </tr>

        @if($payment_request->payment_status_id == "2")
          <tr>
            <td colspan="2">
              <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp; Paga</button>
            </td>
          </tr>
        @else

          <tr>
            <td colspan="2">
              Pagato il {{ $payment_request->paid_on->format('d/m/Y H:i') }}
            </td>
          </tr>
        @endif

        @elseif($payment_request->user->payment_iban == "1")

        <tr>
          <td>Metodo di pagamento</td>
          <td>Iban</td>
        </tr>

        <tr>
          <td>Nome Intestatario</td>
          <td>{{$payment_request->user->payment_detail_iban_name}}</td>
        </tr>

        <tr>
          <td>Cognome Intestatario</td>
          <td>{{$payment_request->user->payment_detail_iban_surname}}</td>
        </tr>

        <tr>
          <td>Conto</td>
          <td>{{$payment_request->user->payment_detail_iban_number}}</td>
        </tr>

          @if($payment_request->payment_status_id == "2")
            <tr>
              <td colspan="2">
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp; Paga</button>
              </td>
            </tr>
          @else

            <tr>
              <td colspan="2">
                Pagato il {{ $payment_request->paid_on->format('d/m/Y H:i') }}
              </td>
            </tr>
          @endif

        @else
          <tr colspan="2">
            Questo utente non ha ancora impostato un metodo di pagamento. Contattarlo direttamente su <a href="mailto:{{$payment_request->user->email}}">{{$payment_request->user->email}}</a>
          </tr>
        @endif

        </tbody>
      </table>
    </div>
  </div>
</div>
</form>
@stop
@section('footer_scripts')
  <script src="/js/sweetalert.min.js"></script>

@stop