<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;
// use Laracasts\Presenter\PresentableTrait;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
// use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Article extends Model 
// implements HasMedia
{
    // use PresentableTrait, HasMediaTrait;

    // protected $presenter = 'Sp\Presenters\ArticlePresenter';

    public static function make($title, $slug, $description, $body, $featured_photo_id, $active)
    {
        $item = new static(compact('title', 'slug', 'description', 'body', 'featured_photo_id', 'active'));

        return $item;
    }

    public static function edit($item_id, $title, $slug, $description, $body, $featured_photo_id, $active)
    {
        $item = static::find($item_id);

        $item->title = $title;
        $item->slug = $slug;
        $item->description = $description;
        $item->body = $body;
        $item->featured_photo_id = $featured_photo_id;
        $item->active = $active;

        return $item;
    }

    public function category(){

        return $this->belongsTo('Sp\Models\Category', 'category_id');

    }

     public function user(){

        return $this->belongsTo('App\User', 'user_id');

    }

    public function related()
    {
        return $this->hasMany(\Sp\Models\Article::class, 'category_id', 'category_id')->take(3);
    }



}
