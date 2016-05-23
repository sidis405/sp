<?php

namespace Sp\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\UsersRepo;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersRepo $users_repo)
    {
        $user = $users_repo->getById(\Auth::user()->id);

        $categories = array_values(array_unique(array_pluck(array_pluck($user->articles, 'category'), 'name')));

        return view('dashboard.article-list', compact('user', 'categories'));

    }


    public function edit($id, ArticleRepo $article_repo)
    {
        $article = $article_repo->getByIdForEditing($id, \Auth::user()->id);

        if(! $article ) return abort(404);

        return view('dashboard.edit-article', compact('article'));
    }
   

}
