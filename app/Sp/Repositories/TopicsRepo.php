<?php

namespace Sp\Repositories;

use Sp\Models\Topics;

class TopicsRepo
{

    public function save(Topics $topic)
    {
        $topic->save();

        return $topic;
    }

    public function getAll()
    {
        return Topics::orderBy('name', 'ASC')->get();
    } 

    public static function getAllFront()
    {
        return Topics::orderBy('ondate', 'ASC')->whereActive('1')->get();
    }

    public function getById($id)
    {
        return Topics::where('id', $id)->first();
    } 

    public function getBySlugFront($slug)
    {
        return Topics::where('slug', $slug)->first();
    } 
}
