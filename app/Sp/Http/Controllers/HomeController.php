<?php

namespace Sp\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sp\Repositories\CategoryRepo;


class HomeController extends Controller
{


    public function home()
    {
        return view('pages.home');
    }

    public function news()
    {
        return view('pages.news');
    }

    public function category()
    {
        return view('pages.category');
    }

    public function single()
    {
        return view('pages.single');
    }

    public function create_post()
    {
        return view('pages.create-post');
    }

    public function post_list()
    {
        return view('pages.post-list');
    }

    public function profile()
    {
        return view('pages.profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryRepo $category_repo)
    {
        $category = $category_repo->getAll();

        return view('category.index', compact('category'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, CategoryRepo $category_repo)
    {
        $category = $category_repo->getById($id);

        return view('category.show', compact('category'));
    }

}
