@extends('layouts.master')
@section('header_scripts')
<link rel="stylesheet" href="/css/bootstrap-select.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-fileinput/css/fileinput.css">
@stop
@section('content')
<!-- <div class="page-bg news-bg"></div> -->
@include('layouts.header')
<div class="container">
  <form  method="POST" role="form" action="/admin/categorie/{{$category->id}}" enctype="multipart/form-data">
    <div class="l-create-post-page">
      <h1 class="page-title">Modifica categoria: '{{$category->name}}'</h1>
      @include('errors.errors')
      <div class="row">
        <div class="col-sm-12">
          {{csrf_field()}}
          <input type="hidden" name="category_id" value="{{$category->id}}">
          <div class="form-group">
            <input type="text" placeholder="Nome" name="name"  value="{{old('name', $category->name)}}" required="required" class="form-control">
          </div>
          <div class="form-group">
            <textarea name="description" placeholder="Breve descrizione" cols="30" rows="5" class="form-control">{{old('description', $category->description)}}</textarea>
          </div>
          <div class="form-group">
          <div class="input-group">
          <div class="input-group-addon">&euro;</div>
            <input type="text" placeholder="Payoff (x 1000 visite)" name="payoff"  value="{{old('payoff', $category->payoff)}}" required="required" class="form-control">
            
          </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xs-12"><button type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-save"></i> Salva</button></div>
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </form>
  
</div>
@stop