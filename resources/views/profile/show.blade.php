@extends('layouts.master')

@section('content')
    <div class="page-bg news-bg holderjs"></div>
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
                    <div class="profile-data">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>news</th>
                            <th>condivisioni</th>
                            <th>contributor level</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><b>{{count($user->articles)}}</b></td>
                            <td><b>0</b></td>
                            <td><img data-src="holder.js/48x48"></td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="profile-social"><a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-primary"><i class="fa fa-twitter"></i></a><a href="#" class="btn btn-primary"><i class="fa fa-google"></i></a><a href="#" class="btn btn-primary"><i class="fa fa-globe"></i></a></div>
                      <div class="profile-desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, placeat dicta? Mollitia sint consectetur at repellendus obcaecati error unde dolores quod, inventore, deleniti rem temporibus optio nesciunt, quas eligendi tempore.</p>
                      </div>
                      <div class="adv"><img data-src="holder.js/100px250?theme=social"></div>
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