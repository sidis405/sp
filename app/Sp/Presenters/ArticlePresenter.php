<?php

namespace Sp\Presenters;

use Laracasts\Presenter\Presenter;

class ArticlePresenter extends Presenter
{
    public function carousel($active = false)
    {

        $active = ($active) ? ' active ' : '';

        return '<div class="item ' . $active . ' ">
                    <a href="' . $this->article_url() . '">
                        '. $this->article_image() .'
                    </a>
                    <div class="container">
                      <div class="carousel-caption">
                        ' . $this->category->present()->carousel_category_url(). '
                        <span class="post-date">' . date('d.m.Y', strtotime($this->created_at)) .'</span>
                        <h1><a href="' . $this->article_url() . '">' . $this->title.'</a></h1>
                        <a href="' . $this->user->present()->user_url(). '" class="author">
                            <i class="fa fa-user fa-fw"></i> ' . $this->user->present()->user_name(). '
                        </a>
                      </div>
                    </div>
                  </div>';
    } 


    public function large()
    {

        return '<div class="post post-'.$this->category->color.'">
                <div class="post-img">
                  <div class="category">' . $this->category->present()->category_url(). '</div>
                  <a href="' . $this->article_url() . '">'. $this->article_image() .'</a>
                </div>
                <h1 class="post-title"><a href="' . $this->article_url() . '">' . $this->title .'</a></h1>
                <h2 class="post-desc">' . $this->description .'</h2>
                <div class="post-toolbar"><span class="author"><a href="' . $this->user->present()->user_url(). '">' . $this->user->present()->user_name(). '</a></span>
                <span class="controls"><a href="#"><span>' . $this->view_counter. '</span> Visualizzazioni </a></span></div>
              </div>';
    } 

     public function big()
    {

        return '<div class="post post-'.$this->category->color.'">
                <div class="post-img">
                  <div class="category">' . $this->category->present()->category_url(). '</div>
                  <a href="' . $this->article_url() . '">'. $this->article_image() .'</a>
                </div>
                <h1 class="post-title"><a href="' . $this->article_url() . '">' . $this->title .'</a></h1>
                <h2 class="post-desc">' . $this->description .'</h2>
                <div class="post-toolbar"><span class="author"><a href="' . $this->user->present()->user_url(). '">' . $this->user->present()->user_name(). '</a></span>
                <span class="controls"><a href="#"><span>' . $this->view_counter. '</span> Visualizzazioni </a></span></div>
              </div>';
    } 


    public function medium()
    {
        return '<div class="col-sm-6">
                  <div class="post post-'.$this->category->color.'">
                    <div class="post-img">
                      <div class="category">' . $this->category->present()->category_url(). '</div>
                      <a href="' . $this->article_url() . '">'. $this->article_image() .'</a>
                    </div>
                    <h1 class="post-title"><a href="' . $this->article_url() . '">' . $this->title . '</a></h1>
                    <div class="post-toolbar"><span class="author"><a href="' . $this->user->present()->user_url(). '">' . $this->user->present()->user_name(). '</a></span><span class="controls"><a href="#"><span>' . $this->view_counter. '</span> Visualizzazioni </a></span></div>
                  </div>
                </div>';
    }

    public function small()
    {
        return '<div class="post post-'.$this->category->color.'">
                <div class="post-img">
                  <div class="category">' . $this->category->present()->category_url(). '</a></div>
                  <a href="' . $this->article_url() . '">'. $this->article_image() .'</a>
                </div>
                <h1 class="post-title"><a href="' . $this->article_url() . '">' . $this->title . '</a></h1>
                <div class="post-toolbar">
                    <span class="author">
                        <a href="' . $this->user->present()->user_url(). '">' . $this->user->present()->user_name_short(). '</a>
                    </span>
                    <span class="controls"><a href="#"><span>' . $this->view_counter. '</span> Visualizzazioni </a></span></div>
              </div>';
    }   

    public function sidebar()
    {
        return '<div class="post post-sidebar post-'.$this->category->color.'"">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="post-img">
                        <div class="category">' . $this->category->present()->category_url(). '</div>
                        <a href="' . $this->article_url() . '">
                          <div class="img" style="height: 120px; background: url('. $this->article_image() .') no-repeat center center"></div></a>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <h1 class="post-title"><a href="' . $this->article_url() . '">' . $this->title . '</a></h1>
                      <div class="post-toolbar"><span class="author"><a href="' . $this->user->present()->user_url(). '">' . $this->user->present()->user_name(). '</a></span></div>
                    </div>
                  </div>
                </div>';
    }

    public function small_profile()
    {
      return '<div class="post post-profile post-'.$this->category->color.'"">
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="post-img">
                              <div class="category">' . $this->category->present()->category_url(). '</div>
                              <a href="' . $this->article_url() . '">'. $this->article_image() .'</a>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <h1 class="post-title"><a href="' . $this->article_url() . '">' . $this->title . '</a></h1>
                            <div class="post-toolbar">
                            <span class="author">' . $this->user->present()->user_name(). '</span>
                            <span class="date"></span><span class="controls"><a href="#"><span>' . $this->view_counter. '</span> Visualizzazioni </a></span></div>
                          </div>
                        </div>
                      </div>';
    }


    public function article_url()
    {
        return '/categorie/' . $this->category->slug . '/articolo/' . $this->id . '/'. $this->slug;
    }  

    public function article_image($width=730, $height = 350)
    {
       $path = (strpos($this->image_path, "htt") !== 0) ? '/media/'.$this->image_path : $this->image_path;

        return '<img src="' . $path . '" class="img-responsive">';
        // return '<img src="' . $this->image_path . 'w=' . $width . '&h=' . $height . '&fit=crop" class="img-responsive">';
    }

    public function article_image_url()
    {

      $path = (strpos($this->image_path, "htt") !== 0) ? 'http://' . env('LOCAL_URL') . '/media/'.$this->image_path : $this->image_path;

      return $path;
    }
}
