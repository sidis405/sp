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

   
                 <h2>Imposta nuova password</h2>
                
                <div>
                  
                  <!-- resources/views/auth/reset.blade.php -->

                  <form method="POST" action="/password/reset">
                      {!! csrf_field() !!}
                      <input class="form-control" type="hidden" name="token" value="{{ $token }}">

                      @if (count($errors) > 0)
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      @endif

                      <div>
                          La tua Email
                          <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                      </div>

                      <div>
                          La Nuova Password
                          <input class="form-control" type="password" name="password">
                      </div>

                      <div>
                          Conferma la nuova Password
                          <input class="form-control" type="password" name="password_confirmation">
                      </div>

                      <div>
                          <button class="form-control btn btn-primary" type="submit">
                              Salva
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