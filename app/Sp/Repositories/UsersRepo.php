<?php

namespace Sp\Repositories;

use App\User;
use Sp\Models\Article;

class UsersRepo
{

    public function save(User $user)
    {
        $user->save();

        return $user;
    }



    public function getBySlug($slug)
    {
        return User::with('articles.category')->where('username', $slug)->first();
    } 

    public function getAll()
    {
        return User::orderBy('name', 'ASC')->get();
    } 

    public function getAllForListing()
    {
        return User::where('role', 'user')->with('articles')->orderBy('name', 'ASC')->get();
    } 

    public function getById($id)
    {
        return User::with('all_articles.category', 'all_articles.status')->where('id', $id)->first();
    } 

    public function getWithLatestArticles($user_id)
    {
        return User::where('id', $user_id)->with('articles', 'latest_articles.visits', 'latest_articles.category')->first();
    }   

    public function getFeaturedForProfile($user_id)
    {
        return Article::where('user_id', $user_id)->where('status_id', 3)->orderBy('view_counter', 'DESC')->take(2)->get();
    }
}
