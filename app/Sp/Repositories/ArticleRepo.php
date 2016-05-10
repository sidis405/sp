<?php

namespace Sp\Repositories;

use Sp\Models\Article;

class ArticleRepo
{

    public function save(Article $article)
    {
        $article->save();

        return $article;
    }

    public function getAll()
    {
        return Article::all();
    } 

    public function getById($id)
    {
        return Article::where('id', $id);
    } 

    public function getBySlug($slug)
    {
        return Article::where('slug', $slug);
    } 
}
