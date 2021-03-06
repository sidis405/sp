<?php

namespace Sp\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
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

        return redirect()->to('admin/nuovi-articoli');

        $user = $users_repo->getById(\Auth::user()->id);

        // return $user->articles;

        $categories = array_values(array_unique(array_pluck(array_pluck($user->articles, 'category'), 'name')));

        // return $categories;

        return view('dashboard.article-list', compact('user', 'categories'));

    }
   

}
