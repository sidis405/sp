<?php

namespace Sp\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sp\Repositories\UsersRepo;


class UsersController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_slug, UsersRepo $users_repo)
    {
        $user = $users_repo->getBySlug($user_slug);

        if(! $user) return abort(404);

        $articles = $this->flattenByCategory($user->articles);

        // return $articles;

        return view('profile.show', compact('user', 'articles'));
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
