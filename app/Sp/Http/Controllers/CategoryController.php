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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, CategoryRepo $category_repo)
    {
        $category = $category_repo->getBySlug($slug);

        // return $category;
        $featured = json_decode(json_encode(array_slice($category->articles->toArray(), 0, 3)));
        


        // $featured = array_slice($category->articles, 3);
        
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
        $section1['main_carousel'] = json_decode(json_encode(array_slice($articles->toArray(), 0, 3)));
        $section1['featured'] = json_decode(json_encode(array_slice($articles->toArray(), 3, 1)));
        $section1['medium'] = json_decode(json_encode(array_slice($articles->toArray(), 4, 2)));
        $section1['sidebar'] = json_decode(json_encode(array_slice($articles->toArray(), 7, 3)));



        $section2 = [];
        //Main featured slider
        $section2['small'] = json_decode(json_encode(array_slice($articles->toArray(), 10, 4)));


        $section3 = [];
        $section3['medium'] = json_decode(json_encode(array_slice($articles->toArray(), 14, 2)));
        $section3['small'] = json_decode(json_encode(array_slice($articles->toArray(), 16, 6)));



        $data = [
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3
        ];

        return $data;

    }

}
