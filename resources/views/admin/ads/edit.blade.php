@extends('layouts.master')
@section('header_scripts')
<link rel="stylesheet" href="/css/bootstrap-select.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-fileinput/css/fileinput.css">
@stop
@section('content')
<!-- <div class="page-bg news-bg"></div> -->
@include('layouts.header')
<div class="container">
  <form  method="POST" role="form" action="/admin/ads/{{$ad->id}}" enctype="multipart/form-data">
    <div class="l-create-post-page">
      <h1 class="page-title">Modifica ad: '{{$ad->description}} ({{$ad->name}})'</h1>
      @include('errors.errors')
      <div class="row">
        <div class="col-sm-12">
          {{csrf_field()}}
          <input type="hidden" name="ad_id" value="{{$ad->id}}">
          <div class="form-group">
            <textarea name="content" placeholder="Contenuto" cols="30" rows="5" class="form-control">{{old('content', $ad->content)}}</textarea>
          </div>

          <div class="form-group">
            <label for="active">Visualizza</label>
            <select name="active" class="form-control">
                <option value="1" @if($ad->active == "1") selected @endif>Si</option>
                <option value="0" @if($ad->active == "0") selected @endif>No</option>
            </select>
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