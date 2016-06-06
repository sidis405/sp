@extends('layouts.master')

@section('content')

<div class="page-bg"></div>
    @include('layouts.header')
    
    <div class="l-main">
      <div class="container-fluid bleeding">
        <div class="intro">
          <div class="row">

            <div class="col-sm-offset-4 col-sm-4">
              <div class="inner-intro inner-intro-login">

   
                 <h2>Accedi ora</h2>
                
                <div>
                  
                  <form action="/auth/login" method="POST" role="form">
                    {!! csrf_field() !!}
                    @include('errors.errors')
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" id="" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" id="" name="password" placeholder="Password">
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        <i class="input-helper"></i>
                        Ricorda la mia password
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Accedi</button>
                    <span style="display: block; text-align: center;">oppure</span>
                    <a href="/auth/facebook" class="btn btn-facebook btn-lg btn-block"><i class="fa fa-facebook fa-fw"></i> Accedi tramite Facebook</a>
                  </form>

                </div>
        

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    
@stop