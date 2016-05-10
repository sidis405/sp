<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Article extends Model implements HasMedia
{
    use PresentableTrait, HasMediaTrait;

    protected $presenter = 'Sp\Presenters\ArticlePresenter';

    public static function make($title, $slug, $description, $body, $featured_photo_id)
    {
        $item = new static(compact('title', 'slug', 'description', 'body', 'featured_photo_id'));

        return $item;
    }

    public static function edit($item_id, $title, $slug, $description, $body, $featured_photo_id)
    {
        $item = static::find($item_id);

        $item->title = $title;
        $item->slug = $slug;
        $item->description = $description;
        $item->body = $body;
        $item->featured_photo_id = $featured_photo_id;

        return $item;
    }

    public function category(){

        return $this->belongsTo('Sp\Models\Category', 'category_id');

    }



}
