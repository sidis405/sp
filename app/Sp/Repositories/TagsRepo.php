<?php

namespace Sp\Repositories;

use Sp\Models\Tags;

class TagsRepo
{

    public function save(Tags $tag)
    {
        $tag->save();

        return $tag;
    }

    public function getAll()
    {
        return Tags::orderBy('tag', 'ASC')->get();
    } 

    public function getById($id)
    {
        return Tags::where('id', $id)->first();
    } 

    public function getByTag($tag)
    {
        return Tags::where('tag', $tag)->first();
    }
}
