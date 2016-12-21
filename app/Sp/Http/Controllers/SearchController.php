<?php

namespace Sp\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\AdsRepo;
use Sp\Repositories\ArticleRepo;
use App\Http\Controllers\Controller;


class SearchController extends Controller
{


    public function search(Request $request, ArticleRepo $article_repo, AdsRepo $ads_repo)
    {
        $articles = $article_repo->search($request->input('q'));

        // return $articles;

        $ads = $ads_repo->getForPage('home');

        return view('search', compact('articles', 'ads'));
    }

}
