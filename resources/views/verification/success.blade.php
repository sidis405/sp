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

   
               <div>
                  
                  <h1 clasS="page-title">Il tuo account e stato attivato</h1>
                            
                            <a href="/login" class="btn btn-default btn-big">Accedi!</a>

                </div>
        

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    
@stop