@extends('layouts.master')

@section('content')

    @if($ads['background_dashboard']->active)
    <div class="page-bg news-bg">{!!$ads['background_dashboard']->content!!}</div>

      @endif
    @include('layouts.header')
    <div class="container">
      <div class="l-news-page">
        <div class="adv"><img data-src="holder.js/100px90?theme=social"></div>
        <div class="row">
          <div class="col-sm-8">
            <div class="l-main">
              <div class="post post-single post-{{$article->category->color}}">
                <div class="post-meta">
                  <div class="category">{{$article->category->name}}</div>
                  <div class="date">Pubblicato il {{$article->created_at->format('d.m.Y')}} alle {{$article->created_at->format('H:i')}}</div>
                </div>
                <div class="clearfix"></div>
                <h1 class="single-title">{{$article->title}} (ANTEPRIMA)</h1>
                <p class="post-desc">{{$article->description}}</p>
                <div class="post-meta">
                  <div class="author"><img src="{{$article->user->avatar}}"><span>Articolo di <a href="{{$article->user->present()->user_url()}}">{{$article->user->present()->user_name()}}</a></span></div>
                </div>
                <div class="post-img"><img src="{{$article->present()->article_image_url}}"></div>
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
                  <p>{!!$article->body!!}</p>
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
                  <div class="post post-sidebar post-{{$related->category->color}}">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="post-img">
                          <div class="category"><a href="/categorie/{{$related->category->name}}">Cronaca</a></div><img class="img-responsive post-red" src="{{$related->image_path}}"/>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <h1 class="post-title"><a href="#">{{$related->title}}</a></h1>
                        <div class="post-toolbar"><span class="author">{{$related->user->name}}</span></div>
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