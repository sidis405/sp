@extends('layouts.master')

@section('content')

    @if($ads['background_category']->active)
    <div class="page-bg news-bg">{!!$ads['background_category']->content!!}</div>

      @endif
    @include('layouts.header')
    <div class="container">
      <div class="l-news-page">
        @if($ads['top_banner_category']->active)
        <div class="adv">{!!$ads['top_banner_category']->content!!}</div>
        @endif
        <div class="row">
          @include('categories.sections.section01', ['section' => $articles['section1']])

          
        </div>
        <div class="row smaller-titles">
          
          @include('categories.sections.section02', ['section' => $articles['section2']])
        </div>
      </div>
      @if($ads['mid_banner_category']->active)
        <div class="adv">{!!$ads['mid_banner_category']->content!!}</div>
        @endif
      <div class="row">
        
          @include('categories.sections.section03', ['section' => $articles['section3']])
      </div>
       @if($ads['end_banner_category']->active)
        <div class="adv">{!!$ads['end_banner_category']->content!!}</div>
        @endif
    </div>
@stop