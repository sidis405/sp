@extends('layouts.master')
@section('content')
<!-- <div class="page-bg news-bg"></div> -->
@include('layouts.header')
<div class="container">
  <form  method="POST" role="form" action="/admin/argomenti">
    <div class="l-create-post-page">
      <h1 class="page-title">Crea un nuovo argomento suggerito</h1>
      @include('errors.errors')
      <div class="row">
        <div class="col-sm-12">
          {{csrf_field()}}
          <div class="form-group">
            <input type="text" placeholder="Nome" name="name"  value="{{old('name')}}" required="required" class="form-control">
          </div>
          <div class="form-group">
            <textarea name="description" placeholder="Breve descrizione" cols="30" rows="5" class="form-control">{{old('description')}}</textarea>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
              <input type="text" placeholder="Data di attivazione (formato YYYY-mm-dd) Lasciare vuoto per data odierna" name="ondate"  value="{{old('ondate')}}" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label for="active">Attiva</label>
              <select class="form-control" name="active">
                <option value="0">No</option>
                <option value="1">Si</option>
                
              </select>
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