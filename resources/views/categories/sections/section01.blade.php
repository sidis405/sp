<div class="col-sm-8">
            <div class="l-main">
       
                  <div id="carousel-latest" data-ride="carousel" class="carousel slide">
                    <div class="widget-title"><a href="#">Ultime notizie</a></div>
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-latest" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-latest" data-slide-to="1"></li>
                      <li data-target="#carousel-latest" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <?php $featured_first = true; ?>
                        @foreach($section['main_carousel'] as $featured_item)
                          <div class="item @if($featured_first) active @endif">
                          <a href="/categorie/{{$category->slug}}/articolo/{{$featured_item->id}}/{{$featured_item->slug}}"><img src="{{$featured_item->image_path}}" class="img-responsive"></a>
                          <?php $featured_first = false; ?>
                            <div class="container">
                              <div class="carousel-caption"><a href="/categorie/{{$category->slug}}" class="category category-blue">{{$category->name}}</a><span class="post-date">{{date('d.m.Y', strtotime($featured_item->created_at))}}</span>
                                <h1><a href="/categorie/{{$category->slug}}/articolo/{{$featured_item->id}}/{{$featured_item->slug}}">{{$featured_item->title}}</a></h1><a href="/utente/{{$featured_item->user->id}}" class="author"><i class="fa fa-user fa-fw"></i> {{$featured_item->user->name}}</a>
                              </div>
                            </div>
                          </div>
                        @endforeach
                    </div><a href="#carousel-latest" data-slide="prev" class="left carousel-control"><span class="glyphicon glyphicon-chevron-left"></span></a><a href="#carousel-latest" data-slide="next" class="right carousel-control"><span class="glyphicon glyphicon-chevron-right"></span></a>
                  </div>
       
              <div class="module-title">
                <h3 class="plus">Letti di {{$category->name}}</h3>
              </div>
              <div class="post post-blue">
                <div class="post-img">
                  <div class="category"><a href="/categorie/{{$category->slug}}">{{$category->name}}</a></div>
                  <a href="/categorie/{{$category->slug}}/articolo/{{$section['featured'][0]->id}}/{{$section['featured'][0]->slug}}"><img class="img-responsive post-blue" src="{{$section['featured'][0]->image_path}}"/></a>
                </div>
                <h1 class="post-title"><a href="/categorie/{{$category->slug}}/articolo/{{$section['featured'][0]->id}}/{{$section['featured'][0]->slug}}">{{$section['featured'][0]->title}}</a></h1>
                <h2 class="post-desc">{{$section['featured'][0]->description}}</h2>
                <div class="post-toolbar"><span class="author"><a href="/utente/{{$section['featured'][0]->user->id}}">{{$section['featured'][0]->user->name}}</a></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="/utente/{{$section['featured'][0]->user->id}}" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
              </div>
              <div class="row">
              @foreach($section['medium'] as $medium_item)
                <div class="col-sm-6">
                  <div class="post post-blue">
                    <div class="post-img">
                      <div class="category"><a href="/categorie/{{$category->slug}}">{{$category->name}}</a></div>
                      <a href="/categorie/{{$category->slug}}/articolo/{{$medium_item->id}}/{{$medium_item->slug}}"><img class="img-responsive post-blue" src="{{$medium_item->image_path}}"/></a>
                    </div>
                    <h1 class="post-title"><a href="/categorie/{{$category->slug}}/articolo/{{$medium_item->id}}/{{$medium_item->slug}}">{{$medium_item->title}}</a></h1>
                    <div class="post-toolbar"><span class="author"><a href="/utente/{{$medium_item->user->id}}">{{$featured_item->user->name}}</a></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
                  </div>
                </div>
                @endforeach
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
                            @foreach($section['sidebar'] as $sidebar_item)
                            <div class="post post-sidebar post-red">
                              <div class="row">
                                <div class="col-xs-6">
                                  <div class="post-img">
                                    <div class="category"><a href="/categorie/{{$category->slug}}">{{$category->name}}</a></div>
                                    <a href="/categorie/{{$category->slug}}/articolo/{{$sidebar_item->id}}/{{$sidebar_item->slug}}"><img class="img-responsive post-red" src="{{$sidebar_item->image_path}}"/></a>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                  <h1 class="post-title"><a href="/categorie/{{$category->slug}}/articolo/{{$sidebar_item->id}}/{{$sidebar_item->slug}}">{{$sidebar_item->title}}</a></h1>
                                  <div class="post-toolbar"><span class="author"><a href="/utente/{{$sidebar_item->user->id}}">{{$featured_item->user->name}}</a></span></div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </aside>
                      </div>
                    </div>