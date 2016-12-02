<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Nicolaslopezj\Searchable\SearchableTrait;

class Article extends Model  implements HasMedia
{
    use PresentableTrait, HasMediaTrait, SearchableTrait;

    protected $presenter = 'Sp\Presenters\ArticlePresenter';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'articles.title' => 10,
            'articles.body' => 7,
            'categories.name' => 4,
        ],
        'joins' => [
            'categories' => ['categories.id','articles.category_id'],
        ],
    ];

    public static function make($title, $description, $body, $category_id)
    {
        $slug = str_slug($title);

        $user_id = \Auth::user()->id;

        $item = new static(compact('title', 'slug', 'description', 'body', 'category_id', 'user_id'));

        return $item;
    }

    public static function edit($article_id, $title, $description, $body, $category_id)
    {
        $item = static::find($article_id);

        $item->title = $title;
        $item->slug = str_slug($title);
        $item->description = $description;
        $item->body = $body;
        $item->category_id = $category_id;
        // $item->featured_photo_id = $featured_photo_id;
        // $item->active = $active;

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

    public function status()
    {
        return $this->belongsTo(\Sp\Models\Status::class, 'status_id');
    }

    public function visits()
    {
        return $this->hasMany(\Sp\Models\Visits::class, 'article_id');
    }

    public function tags(){

        return $this->belongsToMany('Sp\Models\Tags', 'articles_tags', 'article_id', 'tag_id');

    }



}
