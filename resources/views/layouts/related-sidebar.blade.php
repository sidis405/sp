@foreach($article->related as $related)
                  <div class="post post-sidebar post-{{$related->category->color}}">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="post-img">
                          <div class="category"><a href="/categorie/{{$related->category->slug}}">{{$related->category->name}}</a></div>
                          <a href="{{$related->present()->article_url()}}">
                          <div class="img" style="height: 120px; background: url(/media/{{$related->image_path}}) no-repeat center center"></div></a>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <h1 class="post-title"><a href="{{$related->present()->article_url()}}">{{$related->title}}</a></h1>
                        <div class="post-toolbar"><span class="author">{{$related->user->present()->user_name_short}}</span></div>
                      </div>
                    </div>
                  </div>
                  @endforeach