<?php

namespace Sp\Http\Controllers;

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
        $user = $users_repo->getById(\Auth::user()->id);

        $categories = array_values(array_unique(array_pluck(array_pluck($user->articles, 'category'), 'name')));

        return view('dashboard.article-list', compact('user', 'categories'));

    }


    public function edit($id, ArticleRepo $article_repo, CategoryRepo $category_repo)
    {
        $article = $article_repo->getByIdForEditing($id, \Auth::user()->id);

        if(! $article ) return abort(404);

        $categories = $category_repo->getAllList();

        return view('dashboard.edit-article', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request->input();

        $article = $this->dispatchFrom('Sp\Commands\Article\UpdateArticleCommand', $request);
        flash()->success('Articolo aggiornato con successo.');

        return redirect()->to('/dashboard/articolo/' . $article->id .'/modifica');
    }


   

}
