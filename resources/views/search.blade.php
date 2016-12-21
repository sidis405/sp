@extends('layouts.master')

@section('content')
    @if($ads['background_home']->active)
    <div class="page-bg news-bg">{!!$ads['background_home']->content!!}</div>

      @endif
    @include('layouts.header')

    <div class="container">
      <div class="l-profile-page">
        <div class="row">
     
          <div class="col-sm-12">
            <div class="l-main">
              <div class="module-title no-margin">
                
                <div class="module-title no-margin">
                  <h3 class="list">Trovati {{count($articles)}} articoli</h3>
                </div>
                <div role="tab-panel" class="profile-post-list">
                  <ul class="nav nav-tabs">


                      <li role="presentation" class="active"><a  aria-controls="risultati" role="tab" data-toggle="tab">Risultati</a></li>  


                  </ul>
                  <div class="tab-content">


                    <div id="risultati" role="tabpanel" class="tab-pane active ">


                      @foreach($articles as $small_item)
                        
                           {!! $small_item->present()->search_result() !!}
                            
                          
                        @endforeach



                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @stop