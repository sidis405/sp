<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;
// use Laracasts\Presenter\PresentableTrait;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
// use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Category extends Model 
// implements HasMedia
{
    // use PresentableTrait, HasMediaTrait;

    protected $presenter = 'Sp\Presenters\CategoryPresenter';

    public static function make($name, $slug, $description, $active)
    {
        $name = str_slug($name);
        $item = new static(compact('name', 'slug', 'description', 'active'));

        return $item;
    }

    public static function edit($item_id, $name, $description, $active)
    {
        $item = static::find($item_id);

        $item->name = $name;
        $item->slug = str_slug($name);
        $item->description = $description;
        $item->active = $active;

        return $item;
    }

    public function articles(){

        return $this->hasMany('Sp\Models\Article', 'category_id');

    }

}
