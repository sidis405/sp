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

                      {!! $featured_item->present()->carousel($featured_first) !!}

                      <?php $featured_first = false; ?>

                    @endforeach
                </div><a href="#carousel-latest" data-slide="prev" class="left carousel-control"><span class="glyphicon glyphicon-chevron-left"></span></a><a href="#carousel-latest" data-slide="next" class="right carousel-control"><span class="glyphicon glyphicon-chevron-right"></span></a>
              </div>
       
              <div class="module-title">
                <h3 class="plus">Letti di {{$category->name}}</h3>
              </div>

              @if(count($section['featured']))

              {!! $section['featured'][0]->present()->large() !!}
              
              @endif
              <div class="row">
              @foreach($section['medium'] as $medium_item)
                {!! $medium_item->present()->medium() !!}
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
                    
                    {!! $sidebar_item->present()->sidebar() !!}
                  
                  @endforeach
                </div>
              </aside>
            </div>
          </div>