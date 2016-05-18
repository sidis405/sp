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
              <html>
                <body>
                  <div id="carousel-latest" data-ride="carousel" class="carousel slide">
                    <div class="widget-title"><a href="#">Ultime notizie</a></div>
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-latest" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-latest" data-slide-to="1"></li>
                      <li data-target="#carousel-latest" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="item active"><img data-src="holder.js/100px350" class="img-responsive">
                        <div class="container">
                          <div class="carousel-caption"><a href="#" class="category category-blue">Cronaca</a><span class="post-date">12.01.2016</span>
                            <h1><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, dicta temporibus. Ipsum eligendi dignissimos nam delectus qui.</a></h1><a href="#" class="author"><i class="fa fa-user fa-fw"></i> Valentina Marchini</a>
                          </div>
                        </div>
                      </div>
                      <div class="item"><img data-src="holder.js/100px350" class="img-responsive">
                        <div class="container">
                          <div class="carousel-caption"><a href="#" class="category category-blue">Cronaca</a><span class="post-date">12.01.2016</span>
                            <h1><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit dolore veritatis consectetur rerum vel.</a></h1><a href="#" class="author"><i class="fa fa-user fa-fw"></i> Valentina Marchini</a>
                          </div>
                        </div>
                      </div>
                      <div class="item"><img data-src="holder.js/100px350" class="img-responsive">
                        <div class="container">
                          <div class="carousel-caption"><a href="#" class="category category-blue">Cronaca</a><span class="post-date">12.01.2016</span>
                            <h1><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam neque adipisci nulla excepturi, eos eum cumque.</a></h1><a href="#" class="author"><i class="fa fa-user fa-fw"></i> Valentina Marchini</a>
                          </div>
                        </div>
                      </div>
                    </div><a href="#carousel-latest" data-slide="prev" class="left carousel-control"><span class="glyphicon glyphicon-chevron-left"></span></a><a href="#carousel-latest" data-slide="next" class="right carousel-control"><span class="glyphicon glyphicon-chevron-right"></span></a>
                  </div>
                </body>
              </html>
              <div class="module-title">
                <h3 class="plus">Letti di Cronaca</h3>
              </div>
              <div class="post post-blue">
                <div class="post-img">
                  <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-blue" data-src="holder.js/100px250"/>
                </div>
                <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, saepe, magnam. Maiores laboriosam.</a></h1>
                <h2 class="post-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit impedit, quas, fugiat rerum voluptates ipsam ullam mollitia accusamus aut rem fuga, deserunt! Quis neque, consequuntur autem necessitatibus optio repudiandae vitae.</h2>
                <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="post post-blue">
                    <div class="post-img">
                      <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-blue" data-src="holder.js/100px150"/>
                    </div>
                    <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
                    <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="post post-blue">
                    <div class="post-img">
                      <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-blue" data-src="holder.js/100px150"/>
                    </div>
                    <h1 class="post-title"><a href="#">Iste, saepe, magnam. Maiores laboriosam.</a></h1>
                    <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
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
                  <div class="post post-sidebar post-red">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="post-img">
                          <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-red" data-src="holder.js/100px150"/>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit impedit.</a></h1>
                        <div class="post-toolbar"><span class="author">Michele Crotti</span></div>
                      </div>
                    </div>
                  </div>
                  <div class="post post-sidebar post-green">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="post-img">
                          <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-green" data-src="holder.js/100px150"/>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit impedit.</a></h1>
                        <div class="post-toolbar"><span class="author">Michele Crotti</span></div>
                      </div>
                    </div>
                  </div>
                  <div class="post post-sidebar post-blue">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="post-img">
                          <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-blue" data-src="holder.js/100px150"/>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit impedit.</a></h1>
                        <div class="post-toolbar"><span class="author">Michele Crotti</span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
        <div class="row smaller-titles">
          <div class="col-sm-3">
            <div class="post post-red">
              <div class="post-img">
                <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-red" data-src="holder.js/100px150"/>
              </div>
              <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, saepe, magnam. Maiores laboriosam.</a></h1>
              <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="post post-green">
              <div class="post-img">
                <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-green" data-src="holder.js/100px150"/>
              </div>
              <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, saepe, magnam. Maiores laboriosam.</a></h1>
              <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="post post-blue">
              <div class="post-img">
                <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-blue" data-src="holder.js/100px150"/>
              </div>
              <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, saepe, magnam. Maiores laboriosam.</a></h1>
              <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="post post-red">
              <div class="post-img">
                <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-red" data-src="holder.js/100px150"/>
              </div>
              <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, saepe, magnam. Maiores laboriosam.</a></h1>
              <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="adv"><img data-src="holder.js/100px90?theme=social"></div>
      <div class="row">
        <div class="col-sm-6">
          <div class="post post-blue">
            <div class="post-img">
              <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-blue" data-src="holder.js/100px250"/>
            </div>
            <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
            <h2 class="post-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate adipisci obcaecati amet quibusdam repudiandae assumenda dolor sequi incidunt blanditiis enim iusto, consequuntur aliquam maiores itaque provident vero. Fuga, magni repudiandae!</h2>
            <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
          </div>
          <div class="post post-green">
            <div class="post-img">
              <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-green" data-src="holder.js/100px250"/>
            </div>
            <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
            <h2 class="post-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore amet voluptas debitis eius explicabo corrupti. Dolorum nihil adipisci sit, tempora fugiat quaerat explicabo iste, quod ab, quae odit earum illum.</h2>
            <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row smaller-titles">
            <div class="col-sm-6">
              <div class="post post-red">
                <div class="post-img">
                  <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-red" data-src="holder.js/100px150"/>
                </div>
                <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
                <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
              </div>
              <div class="post post-blue">
                <div class="post-img">
                  <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-blue" data-src="holder.js/100px150"/>
                </div>
                <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
                <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
              </div>
              <div class="post post-green">
                <div class="post-img">
                  <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-green" data-src="holder.js/100px150"/>
                </div>
                <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
                <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="post post-green">
                <div class="post-img">
                  <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-green" data-src="holder.js/100px150"/>
                </div>
                <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
                <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
              </div>
              <div class="post">
                <div class="post-img">
                  <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive" data-src="holder.js/100px150"/>
                </div>
                <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
                <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
              </div>
              <div class="post post-red">
                <div class="post-img">
                  <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-red" data-src="holder.js/100px150"/>
                </div>
                <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
                <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="adv"><img data-src="holder.js/100px90?theme=social"></div>
    </div>
@stop