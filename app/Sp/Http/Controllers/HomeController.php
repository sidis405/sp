<?php

namespace Sp\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\AdsRepo;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{


    public function home()
    {
        return view('pages.home');
    }

    // public function news()
    // {
    //     return view('pages.news');
    // }

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

    public function news(ArticleRepo $article_repo,  CategoryRepo $category_repo, AdsRepo $ads_repo)
    {
        $articles = $article_repo->getAllFront();

        // return $category;
        $featured = json_decode(json_encode(array_slice($articles->toArray(), 0, 3)));
        
        // return count($featured);
        $articles = $this->sliceSections($articles);

        // return $articles;
        
        $ads = $ads_repo->getForPage('home');

        // return $ads;

        return view('home.show', compact('featured', 'articles', 'ads'));
    }

    public function sliceSections($articles)
    {
        $data = [];
        

        $section1 = [];
        //Main featured slider
        $section1['main_carousel'] =    $articles->slice(0, 3);
        $section1['featured'] =         $articles->slice(4, 1);
        $section1['medium'] =           $articles->slice(5, 2);
        $section1['sidebar'] =          $articles->slice(8, 3);


        $section2 = [];
        //Main featured slider
        $section2['small'] = $articles->slice(11, 4);


        $section3 = [];
        $section3['big'] = $articles->slice(15, 2);
        $section3['small1'] = $articles->slice(17, 3);
        $section3['small2'] = $articles->slice(21, 3);




        $data = [
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3
        ];

        return $data;

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id, CategoryRepo $category_repo)
    // {
    //     $category = $category_repo->getById($id);

    //     return view('category.show', compact('category'));
    // }

}
