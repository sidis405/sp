@extends('layouts.master')
@section('header_scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
@stop
@section('content')
<div class="page-bg news-bg holderjs"></div>
@include('layouts.header')
<div class="container">
  <div class="l-post-list-page">
    
    <h1 class="page-title">Guadagni e pagamenti
    <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
    </h1>
    <div class="row">
      <div class="col-md-6  month-selector">
        <div class="row">
          <div class="col-md-4">Selezione Mese:</div>
          <div class="col-md-2">
            <div class="form-group">
              <form action="/guadagni-pagamenti" id="select_month_form">
                <input type="text" name="month" class="form-control form-control-1 input-sm from" value="{{$start_for_picker}}" placeholder="CheckIn" >
              </form>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-md-6">
        <h1 id="total" class="pull-right"></h1>
      </div>
    </div>
    <div class="row">
      <div class="chart-holder">
        <canvas id="chart" width="300" height="200"></canvas>
      </div>
    </div>
    <div class="post-list">
      
      <table class="table table-bordered article-list-table">
        <thead>
          <tr>
            <th>Data Pubblicazionie</th>
            <th>Titolo</th>
            <th>Categoria</th>
            <th>Visite Mese</th>
            <th>Payoff</th>
            <th>Totale Visite</th>
            <th>Totale Payoff</th>
          </tr>
        </thead>
        <tbody>
          <?php $total_payoff = 0; ?>
          @foreach($articles as $article)
          <?php $payoff = array_sum(array_pluck($article->visits, 'payoff')); $total_payoff += $payoff; ?>
          <tr class="article-list-row">
            <td>{{$article->created_at->format('d-m-Y')}}</td>
            <td>{{$article->title}}</td>
            <td class="article-list-category">{{$article->category->name}}</td>
            <td class="article-list-state">{{count($article->visits)}}</td>
            <td class="article-list-state">€&nbsp;{{number_format($payoff, 3, ',', '.')}}</td>
            <td class="article-list-state">{{$article->view_counter}}</td>
            <td class="article-list-state">€&nbsp;{{number_format($article->payoff_counter, 3, ',', '.')}}</td>
          </tr>
          @endforeach
          <tr class="article-list-row">
            <td colspan="4"></td>
            <th ><strong>Importo Totale €{{number_format($total_payoff, 2, ',', '.')}}</strong></th>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
@section('footer_scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<script>

var data = {
labels: <?php echo json_encode($visits['labels']); ?>,
datasets: [
                {
                label: "Visite",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: <?php echo json_encode($visits['data']); ?>,
                },

                {
                label: "Payoff",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#991722",
                borderColor: "#991722",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "#991722",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "#991722",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: <?php echo json_encode($visits['payoff']); ?>,
                }
          ]
};
var options = []
var ctx = document.getElementById("chart").getContext("2d");
ctx.canvas.height = 80;
// ctx.canvas.width = 80;
var myLineChart = new Chart(ctx, {
type: 'line',
data: data,
options : {
responsive: true,
maintainAspectRatio: true
}
});
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/locales/bootstrap-datepicker.it.min.js"></script>
<script>
$('.from').datepicker({
autoclose: true,
language: 'it',
minViewMode: 1,
format: 'mm/yyyy'
}).on('changeDate', function(selected){
startDate = new Date(selected.date.valueOf());
startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
// $('.to').datepicker('setStartDate', startDate);
$('#select_month_form').submit();
});
$('#total').html('Importo Totale €{{number_format($total_payoff, 2, ',', '.')}}');
</script>
@stop