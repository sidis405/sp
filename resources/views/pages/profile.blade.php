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
                    <div class="profile-pic"><img data-src="holder.js/100px320" class="img-responsive"></div>
                    <h1 class="profile-name">Michele Crotti</h1><span>Iscritto il 14.02.2012</span>
                    <div class="profile-data">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>news</th>
                            <th>commenti</th>
                            <th>contributor level</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><b>12</b></td>
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
                <h3 class="top">Le Top News di Michele Crotti</h3>
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
                      <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h1>
                      <div class="post-toolbar"><span class="author">Antonio Mautone</span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
                    </div>
                  </div>
                </div>
                <div class="module-title no-margin">
                  <h3 class="list">Tutti gli Articoli di M. Crotti</h3>
                </div>
                <div role="tab-panel" class="profile-post-list">
                  <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#category1" aria-controls="category1" role="tab" data-toggle="tab">Category 1</a></li>
                    <li role="presentation"><a href="#category2" aria-controls="category2" role="tab" data-toggle="tab">Category 2</a></li>
                    <li role="presentation"><a href="#category3" aria-controls="category3" role="tab" data-toggle="tab">Category 3</a></li>
                    <li role="presentation"><a href="#category4" aria-controls="category4" role="tab" data-toggle="tab">Category 4</a></li>
                  </ul>
                  <div class="tab-content">
                    <div id="category1" role="tabpanel" class="tab-pane active">
                      <div class="post post-profile post-red">
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="post-img">
                              <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-red" data-src="holder.js/100px150"/>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit impedit.</a></h1>
                            <div class="post-toolbar"><span class="author">Michele Crotti</span><span class="date"></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
                          </div>
                        </div>
                      </div>
                      <div class="post post-profile post-green">
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="post-img">
                              <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-green" data-src="holder.js/100px150"/>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit impedit.</a></h1>
                            <div class="post-toolbar"><span class="author">Michele Crotti</span><span class="date"></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
                          </div>
                        </div>
                      </div>
                      <div class="post post-profile post-blue">
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="post-img">
                              <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-blue" data-src="holder.js/100px150"/>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit impedit.</a></h1>
                            <div class="post-toolbar"><span class="author">Michele Crotti</span><span class="date"></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="category2" role="tabpanel" class="tab-pane">
                      <div class="post post-profile post-green">
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="post-img">
                              <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-green" data-src="holder.js/100px150"/>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit impedit.</a></h1>
                            <div class="post-toolbar"><span class="author">Michele Crotti</span><span class="date"></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
                          </div>
                        </div>
                      </div>
                      <div class="post post-profile post-blue">
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="post-img">
                              <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-blue" data-src="holder.js/100px150"/>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit impedit.</a></h1>
                            <div class="post-toolbar"><span class="author">Michele Crotti</span><span class="date"></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
                          </div>
                        </div>
                      </div>
                      <div class="post post-profile post-red">
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="post-img">
                              <div class="category"><a href="#">Cronaca</a></div><img class="img-responsive post-red" data-src="holder.js/100px150"/>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <h1 class="post-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit impedit.</a></h1>
                            <div class="post-toolbar"><span class="author">Michele Crotti</span><span class="date"></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="category3" role="tabpanel" class="tab-pane">...</div>
                    <div id="category4" role="tabpanel" class="tab-pane">...</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 @stop