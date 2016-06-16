<?php

namespace Sp\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
use Sp\Repositories\UsersRepo;
use Sp\Models\Article;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersRepo $users_repo)
    {
        $users = $users_repo->getAllForListing();

        return view('admin.users.index', compact('users'));

    }

    public function show($article_id, UsersRepo $users_repo)
    {
        $user = $users_repo->getById($article_id);

        // return $user;

        return view('admin.users.show', compact('article', 'user'));

    }

    public function rating($article_id, Request $request)
    {

        $article = Article::find($article_id);

        // return $article_id;

        $article->rating = $request->input('payload');
        $article->save();

        return 'true';
    }

    public function status($article_id, Request $request)
    {

        $article = Article::find($article_id);

        // return $article_id;

        $article->status_id = $request->input('payload');
        $article->save();

        return 'true';
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



    // public function edit($id, ArticleRepo $article_repo, CategoryRepo $category_repo)
    // {
    //     $article = $article_repo->getById($id);

    //     if(! $article ) return abort(404);

    //     $categories = $category_repo->getAllList();

    //     return view('admin.users.edit', compact('article', 'categories'));
    // }


    // public function create(CategoryRepo $category_repo)
    // {
 
    //     $categories = $category_repo->getAllList();

    //     return view('dashboard.create-article', compact('categories'));
    // }

    // public function store(Request $request)
    // {
    //     $data = $this->manageFields($request);

    //     // return $request->input();

    //     $article = $this->dispatchFrom('Sp\Commands\Article\CreateArticleCommand', $request, $data);
    //     flash()->success('Articolo creato con successo.');

    //     return redirect()->to('/dashboard/articoli/' . $article->id .'/modifica');
    // }

    // public function update(Request $request, $id)
    // {
    //     $data = $this->manageFields($request);

    //     // return $request->input();

    //     $article = $this->dispatchFrom('Sp\Commands\Article\UpdateArticleCommand', $request, $data);
    //     flash()->success('Articolo aggiornato con successo.');

    //     return redirect()->to('/admin/articoli/' . $article->id .'/modifica');
    // }

    // public function preview($article_id, ArticleRepo $article_repo)
    // {
    //     $article = $article_repo->getById($article_id);


    //     if(! $article || ($article->user_id !== \Auth::user()->id && \Auth::user()->role !== 'admin')) return abort(404);

    //     return view('admin.users.anteprima', compact('article'));

    // }

   

   

}
