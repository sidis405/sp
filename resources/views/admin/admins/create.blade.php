@extends('layouts.master')
@section('header_scripts')
<link rel="stylesheet" href="/css/bootstrap-select.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-fileinput/css/fileinput.css">
@stop
@section('content')
<!-- <div class="page-bg news-bg"></div> -->
@include('layouts.header')
<div class="container">
  <form  method="POST" role="form" action="/admin/amministratori" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="l-create-post-page">
      <h1 class="page-title">Aggiungi un nuovo amministratore su SitoPubblico.it</h1>
      @include('errors.errors')

      {{csrf_field()}}
        <div class="form-group">
          <input type="text" name="name" value="{{ old('name') }}"  placeholder="Nome" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="text"  name="surname" value="{{ old('surname') }}"  placeholder="Cognome" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="text"  name="username" value="{{ old('username') }}" placeholder="Nickname" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="email"  name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="password" name="password_confirmation" placeholder="Conferma password" class="form-control" required>
        </div>
        <div class="row">
          <div class="col-sm-6"><button type="subbmit" class="btn btn-primary btn-lg btn-block">Salva</button></div>
        </div>

    </div>
  </form>
  
</div>
@stop