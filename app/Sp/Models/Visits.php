<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;


class Visits extends Model
{
    protected $table = 'visits';

    public function article()
    {
        return $this->belongsTo(\Sp\Models\Article::class, 'article_id');
    }

    public function category()
    {
        return $this->hasManyThrough(\Sp\Models\Category::class, \Sp\Models\Article::class, 'category_id', 'article_id');
    }
}
