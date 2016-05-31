@extends('layouts.master')
@section('content')
<div class="page-bg news-bg holderjs"></div>
    @include('layouts.header')
    <div class="container">
      <div class="l-profile-settings-page">
        <h1 class="page-title">Impostazioni</h1>
        <div role="tab-panel" class="profile-settings-panel">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Profilo</a></li>
            @if(strlen($user->facebook_id) < 1)
              <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Password</a></li>
            @endif
            <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Metodo Di Pagamento</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab1" role="tabpanel" class="tab-pane active">
              @include('dashboard.partials.profile_form')
            </div>

            @if(strlen($user->facebook_id) < 1)

            <div id="tab2" role="tabpanel" class="tab-pane">
            
              @include('dashboard.partials.password_form')
            </div>

            @endif
            <div id="tab3" role="tabpanel" class="tab-pane">
              
              @include('dashboard.partials.paymethod_form')
            </div>
          </div>
        </div>
      </div>
    </div>
   @stop