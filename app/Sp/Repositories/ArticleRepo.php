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
        return Article::with('status')->get();
    } 

    public function getAllFront()
    {
        return Article::with('status', 'user')->where('status_id', 3)->orderBy('created_at', 'DESC')->get();
    } 

    public function getById($id)
    {
        return Article::with('category', 'user', 'related.user', 'related.category')->where('id', $id)->first();
    } 

    public function getByIdForEditing($id, $user_id)
    {
        return Article::with('category', 'user', 'related.user', 'related.category')->where('id', $id)->where('user_id', $user_id)->first();
    } 

    public function getBySlug($slug)
    {
        return Article::with('category', 'user', 'related.user', 'related.category')->where('slug', $slug)->first();
    } 
}
