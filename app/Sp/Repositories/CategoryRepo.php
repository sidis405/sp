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
        return Category::with('articles')->orderBy('name', 'ASC')->get();
    } 

    public function getAllList()
    {
        return Category::orderBy('name', 'ASC')->get();
    } 

    public function getById($id)
    {
        return Category::where('id', $id)->first();
    } 

    public function getBySlug($slug)
    {
        return Category::with('articles.user')->where('slug', $slug)->first();
    } 

    public function getBySlugFront($slug)
    {
        return Category::with('articles.user')->where('slug', $slug)->first();
    } 
}
