<?php

namespace Sp\Repositories;

use Sp\Models\Category;

class CategoryRepo
{

    public function save(Category $category)
    {
        $category->save();

        return $category;
    }

    public function getAll()
    {
        return Category::with('article')->get();
    } 

    public function getById($id)
    {
        return Category::where('id', $id)->first();
    } 

    public function getBySlug($slug)
    {
        return Category::with('articles.user')->where('slug', $slug)->first();
    } 
}
