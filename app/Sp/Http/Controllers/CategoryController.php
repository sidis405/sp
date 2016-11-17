<?php

namespace Sp\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sp\Repositories\CategoryRepo;


class CategoryController extends Controller
{
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, CategoryRepo $category_repo)
    {
        $category = $category_repo->getBySlugFront($slug);

        // return $category;
        $featured = json_decode(json_encode(array_slice($category->articles->toArray(), 0, 3)));
        
        // return count($featured);
        $articles = $this->sliceSections($category->articles);

        // return $articles;
        return view('categories.show', compact('category', 'featured', 'articles'));
    }

    public function sliceSections($articles)
    {
        $data = [];
        

        $section1 = [];
        //Main featured slider
        $section1['main_carousel'] =    $articles->slice(0, 3);
        $section1['featured'] =         $articles->slice(3, 1);
        $section1['medium'] =           $articles->slice(4, 2);
        $section1['sidebar'] =          $articles->slice(6, 3);


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

}
