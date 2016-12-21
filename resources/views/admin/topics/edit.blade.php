@extends('layouts.master')
@section('content')
<!-- <div class="page-bg news-bg"></div> -->
@include('layouts.header')
<div class="container">
  <form  method="POST" role="form" action="/admin/argomenti/{{$topic->id}}">
  <input type="hidden" name="topic_id" value="{{$topic->id}}">
    <div class="l-create-post-page">
      <h1 class="page-title">Crea un nuovo argomento suggerito</h1>
      @include('errors.errors')
      <div class="row">
        <div class="col-sm-12">
          {{csrf_field()}}
          <div class="form-group">
            <input type="text" placeholder="Nome" name="name"  value="{{old('name', $topic->name)}}" required="required" class="form-control">
          </div>
          <div class="form-group">
            <textarea name="description" placeholder="Breve descrizione" cols="30" rows="5" class="form-control">{{old('description', $topic->description)}}</textarea>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
              <input type="text" placeholder="Data di attivazione (formato YYYY-mm-dd). Lasciare vuoto per data odierna" name="ondate"  value="{{old('ondate', $topic->ondate->format('Y-m-d'))}}"  class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label for="active">Attiva</label>
              <select class="form-control" name="active">
                <option value="1" @if($topic->active == "1") selected @endif>Si</option>
                <option value="0" @if($topic->active == "0") selected @endif>No</option>
                
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