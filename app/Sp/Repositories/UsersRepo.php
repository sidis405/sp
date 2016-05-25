<?php

namespace Sp\Repositories;

use App\User;

class UsersRepo
{

    public function getBySlug($slug)
    {
        return User::with('articles.category')->where('username', $slug)->first();
    } 

    public function getById($id)
    {
        return User::with('articles.category', 'articles.status')->where('id', $id)->first();
    } 
}
