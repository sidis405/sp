<?php

namespace Sp\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sp\Repositories\ArticleRepo;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleRepo $article_repo)
    {
        $article = $article_repo->getAll();

        return view('article.index', compact('article'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ArticleRepo $article_repo)
    {
        $article = $article_repo->getById($id);

        return view('article.show', compact('article'));
    }

}
