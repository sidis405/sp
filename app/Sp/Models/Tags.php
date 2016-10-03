<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;



class Tags extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function make($tag)
    {
        $tag = str_slug($tag);
        $item = new static(compact('tag'));

        return $item;
    }

    public function articles(){

        return $this->belongsToMany('Sp\Models\Article', 'articles_tags', 'tag_id', 'article_id')->where('status_id', 3);

    }

}
