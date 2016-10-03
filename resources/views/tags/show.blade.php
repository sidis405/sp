@extends('layouts.master')

@section('content')
    <div class="page-bg news-bg holderjs"></div>
    @include('layouts.header')

    <div class="container">
      <div class="l-profile-page">
        <div class="row">
       
          <div class="col-sm-12">
            <div class="l-main">
              <div class="module-title no-margin">

                <div class="module-title no-margin">
                  <h3 class="list">Tutti gli Articoli taggati #{{$tag->tag}}</h3>
                </div>
                <div role="tab-panel" class="profile-post-list">
                  <ul class="nav nav-tabs">
                  <?php $firstCat = true; ?>
                    @foreach($articles as $category=>$article)
                      <li role="presentation" @if($firstCat) class="active" @endif><a href="#category{{str_slug($category)}}" aria-controls="category{{str_slug($category)}}" role="tab" data-toggle="tab">{{$category}}</a></li>  
                      <?php $firstCat = false; ?>
                    @endforeach
                  </ul>
                  <div class="tab-content">
                  <?php $firsttab = true; ?>
                    @foreach($articles as $category=>$article)
                    <div id="category{{str_slug($category)}}" role="tabpanel" class="tab-pane  @if($firsttab) active @endif">


                      @foreach($article as $small_item)
                        
                           {!! $small_item->present()->small_profile() !!}
                          
                        @endforeach

                    <?php $firsttab = false; ?>

                  </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @stop