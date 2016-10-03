<?php

namespace Sp\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\CategoryRepo;
use Sp\Repositories\TagsRepo;



class TagsController extends Controller
{



    /**
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, TagsRepo $tags_repo)
    {
        $tag = $tags_repo->getBySlugFront($slug);

        
        $articles = $this->flattenByCategory($tag->articles);

        // return $articles;
        return view('tags.show', compact('tag', 'featured', 'articles'));
    }

    public function flattenByCategory($articles)
    {

        $data = [];

        foreach ($articles as $article) {
            
            if(!isset($data[$article->category->name])) $data[$article->category->name] = [];
            $data[$article->category->name][] = $article;

        }
        array_multisort(array_map('count', $data), SORT_DESC, $data);
        return $data;
    }

}
