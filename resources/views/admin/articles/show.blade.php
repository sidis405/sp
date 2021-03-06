@extends('admin.layouts.master')

@section('header_scripts')
<link rel="stylesheet" href="/css/star-rating.min.css">
<link rel="stylesheet" href="/css/sweetalert.css">

<meta name="_token" content="{{ csrf_token() }}" />


@stop

@section('content')

    <!-- <div class="page-bg news-bg "></div> -->
    @include('layouts.header')
    <div class="container">
      <div class="l-news-page">
        <h1 class="page-title">Articolo: '{{$article->title}}'</h1>

        <div class="row">
          <div class="col-sm-8">
            <div class="l-main">
              <div class="post post-single post-{{$article->category->color}}">
                <div class="post-meta">
                  <div class="category">{{$article->category->name}}</div>
                  <div class="date">Pubblicato il {{$article->created_at->format('d.m.Y')}} alle {{$article->created_at->format('H:i')}}</div>
                </div>
                <div class="clearfix"></div>
                <h1 class="single-title">{{$article->title}}</h1>
                <p class="post-desc">{{$article->description}}</p>
                <div class="post-meta">
                  <div class="author"><img src="{{$article->user->avatar}}"><span>Articolo di <a href="{{$article->user->present()->user_url()}}">{{$article->user->present()->user_name()}}</a></span></div>
                </div>
                <div class="post-img"><img src="{{$article->present()->article_image_url}}"></div>
                <br>
                <div class="post-body">

                  <p>{!!$article->body!!}</p>
                </div>
                <br>

                <div class="row">
                  <div class="col-xs-12"><a href="/admin/articoli/{{$article->id}}/modifica" class="btn btn-default btn-lg btn-block"><i class="fa fa-edit"></i> Modifica</a></div>

                </div>



                <br>

              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="l-sidebar">


              <aside>
                <div class="white-sidebar">
                  <div class="module-title">
                    <h3 class="star">Valuta Articolo</h3>
                  </div>
                  <div>
                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-article-id="{{$article->id}}" value="{{$article->rating}}" data-size="md" >
                  </div>
                </div>
                <div class="white-sidebar">
                  <div class="module-title">
                    <h3>Utente</h3>
                  </div>
                  <div>
                    <div class="profile">
                        <h1 class="profile-name">{{$user->present()->user_name()}}</h1><span>Iscritto dal {{$user->created_at->format('d.m.Y')}}</span>
                        <div class="profile-data">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>articoli</th>
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

                        </div>
                      </div>
                      <div>
                        <table class="table table-bordered">
                          <tbody>
                            @foreach($user->latest_articles as $article_l)
                            <tr class="article-list-row">
                              <td colspan="4"><a href="/admin/articoli/{{$article_l->id}}">{{$article_l->title}}</a> <span class="pull-right">{{$article_l->rating}}<i class="fa fa-star"></i></span></td>
                            </tr>
                            <tr class="article-list-row">
                              <td>{{$article_l->updated_at->format('d-m-Y H:i')}}</td>
                              <td class="article-list-category">{{$article_l->category->name}}</td>
                              <td class="article-list-category">{{$article_l->view_counter}}</td>

                              <td class="article-list-category">€{{number_format(array_sum(array_pluck($article_l->visits, 'payoff')), 2, ',', '.')}}</td>

                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div>
                        <div class="row">
                          <div class="col-xs-12"><button type="submit" class="btn btn-primary btn-lg btn-block approve-button"><i class="fa fa-thumbs-up"></i> Approva</button></div>

                        </div>
                        <hr>
                        <div class="row">
                          <form method="POST" action="/admin/articoli/{{$article->id}}/rinvia">
                            {{ csrf_field() }}
                          <div class="col-xs-12">
                            <div class="form-group">
                              <textarea class="form-control"  required="" name="admin_notes" placeholder="Scrivi un'osservazione" rows="10">{{$article->admin_notes}}</textarea>
                            </div>
                          </div>
                          <div>
                            <div class="col-xs-12">
                              <u>
                                <small>L'articolo verra' rimosso dalla lista 'Articoli in coda' e inviato all'utente</small>
                              </u>
                            </div>
                          </div>
                          <br>
                          <div class="form-group">
                            <div class="col-xs-12"><button type="submit" onclick="return confirm('Sei Sicuro?')" class="btn btn-primary btn-lg btn-block"><i class="fa fa-edit"></i> Rinvia all'utente</button></div>
                          </div>
                          </form>

                        </div>
                      </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop

@section('footer_scripts')

  <script src="/js/star-rating.min.js"></script>
  <script src="/js/star-rating_locale_it.js"></script>
  <script src="/js/sweetalert.min.js"></script>

  <script>

      $(".rating").rating(
          {
            'language': "it"
          }
        );

      $('.rating').on('rating.change', function(event, value, caption) {

          ajaxCall(value, 'articoli/{{$article->id}}/rating', 'POST', false, false);
      });

      $('.rating').on('rating.clear', function(event) {
          ajaxCall(0, 'articoli/{{$article->id}}/rating', 'POST', false, false);
      });

      $('.approve-button').click(function(){
          swal({
            title: "Sei sicuro di voler approvare questo articolo?",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, approva!",
            cancelButtonText: "No, ho cambiato idea!",
            closeOnConfirm: false,
            closeOnCancel: true
          },
            function(isConfirm){
              if (isConfirm) {
                swal("Approvato!", "Questo Articolo è stato pubblciato.", "success");
                ajaxCall(3, 'articoli/{{$article->id}}/status', 'POST', false, goto('/admin/nuovi-articoli'));
              } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
              }
            });
      })


  </script>
      @stop
