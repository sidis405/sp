<?php

namespace Sp\Presenters;

use Laracasts\Presenter\Presenter;

class CategoryPresenter extends Presenter
{
       public function category_url()
       {
           return '<a href="/categorie/' . $this->slug .'" class="category category-'. $this->color. '">' . $this->name. '</a>';
       }   
}
