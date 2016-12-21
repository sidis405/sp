@extends('layouts.master')

@section('header_scripts')

<meta property="og:url" content="{{\Request::fullUrl()}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$article->title}} | SitoPubblico">
    <meta property="og:description" content="{{$article->description}}">
    <meta property="og:image" content="{{$article->present()->article_image_url()}}">
    <meta property="fb:app_id" content="{{env('FACEBOOK_CLIENT_ID')}}">

@stop

@section('content')

    <div id="fb-root"></div>
       <script>
         (function(d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
         fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
       </script>

    @if($ads['background_article']->active)
    <div class="page-bg news-bg">{!!$ads['background_article']->content!!}</div>

      @endif
    @include('layouts.header')
    <div class="container">
      <div class="l-news-page">
         @if($ads['top_banner_article']->active)
        <div class="adv">{!!$ads['top_banner_article']->content!!}</div>
        @endif
        <div class="row">
          <div class="col-sm-8">
            <div class="l-main">
              <div class="post post-single post-{{$article->category->color}}">
                <div class="post-meta">
                  <div class="category">{{$article->category->name}}</div>
                  <div class="date">Pubblicato il {{$article->updated_at->format('d.m.Y')}} alle {{$article->updated_at->format('H:i')}}</div>
                </div>
                <div class="clearfix"></div>
                <h1 class="single-title">{{$article->title}}</h1>
                <p class="post-desc">{{$article->description}}</p>
                <div class="post-meta">
                  <div class="author"><img src="{{$article->user->avatar}}"><span>Articolo di <a href="{{$article->user->present()->user_url()}}">{{$article->user->present()->user_name()}}</a></span></div>
                </div>
                <div class="post-img"><img src="{{$article->present()->article_image_url()}}"></div>
                <div class="post-toolbar social">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{\Request::fullUrl()}}" class="btn btn-facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/share?url={{\Request::fullUrl()}}&amp;text={{$article->title}}" class="btn btn-twitter"><i class="fa fa-twitter"></i></a>
                <!-- <a href="#" class="btn btn-default btn-right"><i class="fa fa-envelope-o"></i></a> -->
                </div>
                <div class="post-body">
                  <div class="row">
                    @if($ads['mid_banner_1_article']->active)
                    <div class="col-md-6">
                      <div class="adv adv-body">{!!$ads['mid_banner_1_article']->content!!}</div>
                      </div>
                      @endif
                      @if($ads['mid_banner_2_article']->active)
                    <div class="col-md-6">
                        <div class="adv adv-body">{!!$ads['mid_banner_2_article']->content!!}</div>
                        </div>
                        @endif
                  </div>
                  <p>{!!$article->body!!}</p>
                </div>
                <div class="post-toolbar social">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{\Request::fullUrl()}}" class="btn btn-facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/share?url={{\Request::fullUrl()}}&amp;text={{$article->title}}" class="btn btn-twitter"><i class="fa fa-twitter"></i></a>
                <!-- <a href="#" class="btn btn-default btn-right"><i class="fa fa-envelope-o"></i></a> -->
                </div>
                <div class="post-toolbar">
                Tag: 
                  @foreach($article->tags as $tag)
                      <a href="/tag/{{$tag->tag}}">#{{$tag->tag}}</a>
                  @endforeach
                </div>
                <div class="row">
                  @if($ads['end_banner_1_article']->active)
                  <div class="col-md-6">
                    <div class="adv adv-body">{!!$ads['end_banner_1_article']->content!!}</div>
                    </div>
                    @endif
                    @if($ads['end_banner_2_article']->active)
                  <div class="col-md-6">
                      <div class="adv adv-body">{!!$ads['end_banner_2_article']->content!!}</div>
                      </div>
                      @endif
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="l-sidebar">
              @if($ads['box_1_sidebar_article']->active)
                <div class="adv">{!!$ads['box_1_sidebar_article']->content!!}</div>
                @endif
              @if($ads['box_2_sidebar_article']->active)
                <div class="adv">{!!$ads['box_2_sidebar_article']->content!!}</div>
                @endif
              <aside>
                <div class="white-sidebar">
                  <div class="module-title">
                    <h3 class="star">In evidenza</h3>
                  </div>
                  @include('layouts.related-sidebar')
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop