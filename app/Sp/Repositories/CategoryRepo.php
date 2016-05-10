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
        return Category::where('id', $id);
    } 

    public function getBySlug($slug)
    {
        return Category::where('slug', $slug);
    } 
}
