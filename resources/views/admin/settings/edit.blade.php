@extends('layouts.master')
@section('header_scripts')
<link rel="stylesheet" href="/css/bootstrap-select.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-fileinput/css/fileinput.css">
@stop
@section('content')
<!-- <div class="page-bg news-bg"></div> -->
@include('layouts.header')
<div class="container">
  <form  method="POST" role="form" action="/admin/impostazioni" enctype="multipart/form-data">
    <div class="l-create-post-page">
      <h1 class="page-title">Modifica impostazioni SitoPubblico.it</h1>
      @include('errors.errors')
      <div class="row">
        <div class="col-sm-12">
          {{csrf_field()}}
          <div class="form-group">
            <label for="active">Consenti registrazione</label>
            <select name="allow_registration" class="form-control">
                <option value="1" @if($settings->allow_registration == "1") selected @endif>Si</option>
                <option value="0" @if($settings->allow_registration == "0") selected @endif>No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="active">Lunghezza minima caratteri articolo</label>
            <input type="text" class="form-control" name="article_minlength" value="{{$settings->article_minlength}}">
          </div>
          <div class="form-group">
            <label for="active">Lunghezza massima caratteri articolo</label>
            <input type="text" class="form-control" name="article_maxlength" value="{{$settings->article_maxlength}}">
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