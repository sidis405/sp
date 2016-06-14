<?php

namespace Sp\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
use Sp\Repositories\UsersRepo;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersRepo $users_repo)
    {
        $user = $users_repo->getById(\Auth::user()->id);

        // return $user->articles;

        $categories = array_values(array_unique(array_pluck(array_pluck($user->articles, 'category'), 'name')));

        // return $categories;

        // return view('admin.article-list', compact('user', 'categories'));

    }

    public function index_new(ArticleRepo $article_repo)
    {
        $new = $article_repo->getByStatus(2);

        $categories = array_values(array_unique(array_pluck(array_pluck($new, 'category'), 'name')));


        return view('admin.articles.index_new', compact('new', 'categories'));

    }

    public function edit($id, ArticleRepo $article_repo, CategoryRepo $category_repo)
    {
        $article = $article_repo->getById($id);

        if(! $article ) return abort(404);

        $categories = $category_repo->getAllList();

        return view('admin.articles.edit', compact('article', 'categories'));
    }


    public function create(CategoryRepo $category_repo)
    {
 
        $categories = $category_repo->getAllList();

        return view('dashboard.create-article', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->manageFields($request);

        // return $request->input();

        $article = $this->dispatchFrom('Sp\Commands\Article\CreateArticleCommand', $request, $data);
        flash()->success('Articolo creato con successo.');

        return redirect()->to('/dashboard/articoli/' . $article->id .'/modifica');
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
        $data = $this->manageFields($request);

        // return $request->input();

        $article = $this->dispatchFrom('Sp\Commands\Article\UpdateArticleCommand', $request, $data);
        flash()->success('Articolo aggiornato con successo.');

        return redirect()->to('/dashboard/articoli/' . $article->id .'/modifica');
    }

    public function preview($article_id, ArticleRepo $article_repo)
    {
        $article = $article_repo->getById($article_id);


        if(! $article || ($article->user_id !== \Auth::user()->id && \Auth::user()->role !== 'admin')) return abort(404);

        return view('admin.articles.anteprima', compact('article'));

    }

    public function manageFields(Request $request)
    {
        $data = [];

        if($request->hasFile('article-featured-image'))
        {
            $data['file'] = $request->file('article-featured-image');
        }else{
            $data['file'] = null;
        }

        return $data;
    }


   

}
