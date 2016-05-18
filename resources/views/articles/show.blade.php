@extends('layouts.master')

@section('content')

    <div class="page-bg news-bg holderjs"></div>
    @include('layouts.header')
    <div class="container">
      <div class="l-news-page">
        <div class="adv"><img data-src="holder.js/100px90?theme=social"></div>
        <div class="row">
          <div class="col-sm-8">
            <div class="l-main">
              <div class="post post-single post-blue">
                <div class="post-meta">
                  <div class="category">{{$article->category->name}}</div>
                  <div class="date">Pubblicato il {{$article->created_at->format('d.m.Y')}} alle {{$article->created_at->format('H:i')}}</div>
                </div>
                <div class="clearfix"></div>
                <h1 class="single-title">{{$article->title}}</h1>
                <p class="post-desc">{{$article->description}}</p>
                <div class="post-meta">
                  <div class="author"><img src="/images/placeholder-user.jpg"><span>Articolo di <a href="#">{{$article->user->name}}</a></span></div>
                </div>
                <div class="post-img"><img src="{{$article->image_path}}"></div>
                <div class="post-toolbar"><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a><a href="#" class="btn btn-default btn-right"><i class="fa fa-envelope-o"></i></a></div>
                <div class="post-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="adv body-adv"><img data-src="holder.js/100px150?theme=social"></div>
                    </div>
                    <div class="col-sm-6">
                      <div class="adv body-adv"><img data-src="holder.js/100px150?theme=social"></div>
                    </div>
                  </div>
                  <p>{{$article->body}}</p>
                </div>
                <div class="post-toolbar"><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a><a href="#" class="btn btn-default btn-right"><i class="fa fa-envelope-o"></i></a></div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="adv body-adv"><img data-src="holder.js/100px150?theme=social"></div>
                  </div>
                  <div class="col-sm-6">
                    <div class="adv body-adv"><img data-src="holder.js/100px150?theme=social"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="l-sidebar">
              <div class="adv"><img data-src="holder.js/100px250?theme=social"></div>
              <div class="adv"><img data-src="holder.js/100px250?theme=social"></div>
              <aside>
                <div class="white-sidebar">
                  <div class="module-title">
                    <h3 class="star">In evidenza</h3>
                  </div>
                  @foreach($article->related as $related)
                  <div class="post post-sidebar post-red">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="post-img">
                          <div class="category"><a href="/categorie/{{$related->category->name}}">Cronaca</a></div><img class="img-responsive post-red" src="{{$related->image_path}}"/>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <h1 class="post-title"><a href="#">{{$related->title}}</a></h1>
                        <div class="post-toolbar"><span class="author">{{$related->user}}</span></div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop