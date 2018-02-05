@extends('layouts.master')

@section('content')
    @if($ads['background_profile']->active)
    <div class="page-bg news-bg">{!!$ads['background_profile']->content!!}</div>

      @endif
    @include('layouts.header')

    <div class="container">
      <div class="l-profile-page">
        <div class="row">
          <div class="col-sm-4">
            <div class="l-sidebar l-profile-sidebar">
              <aside>
                <div class="white-sidebar">
                  <div class="profile">
                    <div class="profile-pic"><img src="{{$user->avatar}}" class="img-responsive"></div>
                    <h1 class="profile-name">{{$user->present()->user_name()}}</h1><span>Iscritto dal {{$user->created_at->format('d.m.Y')}}</span>
                     <span class="pull-right">{!!$user->present()->follow_button()!!}</span>
                    <div class="profile-data">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>news</th>
                            <th>seguito da</th>
                            <th>contributor level</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><b>{{count($user->articles)}}</b></td>
                            <td><b>{{count($user->followers)}}</b></td>
                            <td>{!! $user->getLevel() !!}</td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="profile-social">
                          @if(strlen($user->social_facebook) > 1)
                          <a href="{{ $user->social_facebook }}" target="_blank" class="btn btn-primary">
                            <i class="fa fa-facebook"></i>
                          </a>
                          @endif
                          @if(strlen($user->social_twitter) > 1)
                          <a href="{{ $user->social_twitter }}" target="_blank" class="btn btn-primary">
                            <i class="fa fa-twitter"></i>
                          </a>
                          @endif
                          @if(strlen($user->social_google) > 1)
                          <a href="{{ $user->social_google }}" target="_blank" class="btn btn-primary">
                            <i class="fa fa-google"></i>
                          </a>
                          @endif
                          @if(strlen($user->social_website) > 1)
                          <a href="{{ $user->social_website }}" target="_blank" class="btn btn-primary">
                            <i class="fa fa-globe"></i>
                          </a>
                          @endif
                        </div>
                      <div class="profile-desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, placeat dicta? Mollitia sint consectetur at repellendus obcaecati error unde dolores quod, inventore, deleniti rem temporibus optio nesciunt, quas eligendi tempore.</p>
                      </div>
                      @if($ads['box_1_sidebar_profile']->active)
                        <div class="adv">{!!$ads['box_1_sidebar_profile']->content!!}</div>
                        @endif
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="l-main">
              <div class="module-title no-margin">
                <h3 class="top">Le Top News di {{$user->present()->user_name()}}</h3>
                <div class="row">
                @foreach($main as $main_item)

                     {!! $main_item->present()->medium() !!}

                @endforeach
                </div>
                <div class="module-title no-margin">
                  <h3 class="list">Tutti gli Articoli di {{$user->present()->user_name_short()}}</h3>
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
