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

   
                 <h2>Reimposta password</h2>
                
                <div>
                  
                  <!-- resources/views/auth/password.blade.php -->

                  <form method="POST" action="/password/email">
                      {!! csrf_field() !!}

                      @if (count($errors) > 0)
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      @endif

                      <div>
                          Email
                          <input type="email"  class="form-control"  name="email" value="{{ old('email') }}">
                      </div>

                      <div>
                          <button type="submit"  class="form-control  btn btn-primary" >
                              Invia link
                          </button>
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