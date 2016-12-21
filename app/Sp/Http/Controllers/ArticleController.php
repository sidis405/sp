<?php

namespace Sp\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Event;
use Illuminate\Http\Request;
use Sp\Events\Article\ArticleWasVisited;
use Sp\Repositories\AdsRepo;
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
    public function show($category_slug, $article_id, $article_slug, ArticleRepo $article_repo, Request $request, AdsRepo $ads_repo)
    {

        $referrer = $request->headers->get('referer');


        $article = $article_repo->getById($article_id);

        // return $article;

        // return $article->status_id;

        if((int) $article->status_id !== 3)  return abort(404);

        $article_visit = $article;
        $article_visit->referrer = $referrer;
        $article_visit->sharecode = $request->input('ref');
        $article_visit->ip = request()->ip();

        $ads = $ads_repo->getForPage('article');

        Event::fire(ArticleWasVisited::class, $article_visit);

        return view('articles.show', compact('article', 'ads'));
    }

}
