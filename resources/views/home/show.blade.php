@extends('layouts.master')

@section('content')

    <div class="page-bg news-bg holderjs"></div>
    @include('layouts.header')
    <div class="container">
      <div class="l-news-page">
        <div class="adv"><img data-src="holder.js/100px90?theme=social"></div>
        <div class="row">
          @include('home.sections.section01', ['section' => $articles['section1']])

          
        </div>
        <div class="row smaller-titles">
          
          @include('home.sections.section02', ['section' => $articles['section2']])
        </div>
      </div>
      <div class="adv"><img data-src="holder.js/100px90?theme=social"></div>
      <div class="row">
        
          @include('home.sections.section03', ['section' => $articles['section3']])
      </div>
      <div class="adv"><img data-src="holder.js/100px90?theme=social"></div>
    </div>
@stop