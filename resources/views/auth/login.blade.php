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
                  <form  method="POST" action="/auth/login">
                    {!! csrf_field() !!}
                    @include('errors.errors')
                    <div class="input-group m-b-20">
                      <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                      <div class="fg-line">
                        <input style="padding: 5px;"  type="text"  name="email"  value="{{ old('email') }}"  class="form-control" placeholder="Email">
                      </div>
                    </div>
                    
                    <div class="input-group m-b-20">
                      <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                      <div class="fg-line">
                        <input style="padding: 5px;" type="password"  name="password"  class="form-control" placeholder="Password">
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        <i class="input-helper"></i>
                        Ricorda la mia password
                      </label>
                    </div>
                    
                <div class="login-btns">
                    <button type="submit" class="btn btn-login btn-danger btn-float btn-lg"><i class="zmdi zmdi-arrow-forward"></i> Accedi</button>
                  <a href="/auth/facebook" class="btn btn-facebook btn-lg"><i class="fa fa-facebook fa-fw"></i> Accedi tramite Facebook</a>
                  </div>
                    
                   
                  </form>
                </div>
        

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    
@stop