<?php

namespace Sp\Http\Controllers\Admin;

use Event;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Models\Article;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
use Sp\Repositories\TagsRepo;
use Sp\Repositories\UsersRepo;
use Sp\Events\Article\ArticleWasApproved;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersRepo $users_repo, ArticleRepo $article_repo, CategoryRepo $category_repo)
    {
        $users = $users_repo->getAll();


        // $categories = $category_repo->getAllList();
        $categories = array_values(array_unique(array_pluck($category_repo->getAllList(), 'name')));
        
        $articles = $article_repo->getAll();

        return view('admin.articles.index', compact('users', 'categories', 'articles'));

    }

    public function index_new(ArticleRepo $article_repo)
    {
        $new = $article_repo->getByStatus(2);

        $categories = array_values(array_unique(array_pluck(array_pluck($new, 'category'), 'name')));


        return view('admin.articles.index_new', compact('new', 'categories'));

    }

    public function edit($id, ArticleRepo $article_repo, CategoryRepo $category_repo,  TagsRepo $tags_repo)
    {
        $article = $article_repo->getById($id);

        // return $article;

        if(! $article ) return abort(404);

        $categories = $category_repo->getAllList();
        $tags = $tags_repo->getAll();

        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
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

        return redirect()->to('/admin/articoli/' . $article->id .'/modifica');
    }

    public function preview($article_id, ArticleRepo $article_repo)
    {
        $article = $article_repo->getById($article_id);


        if(! $article || ($article->user_id !== \Auth::user()->id && \Auth::user()->role !== 'admin')) return abort(404);

        return view('admin.articles.anteprima', compact('article'));

    }

    public function show($article_id, ArticleRepo $article_repo, UsersRepo $users_repo)
    {
        $article = $article_repo->getById($article_id);

        $user = $users_repo->getWithLatestArticles($article->user->id);



        if(! $article || ($article->user_id !== \Auth::user()->id && \Auth::user()->role !== 'admin')) return abort(404);

        return view('admin.articles.show', compact('article', 'user'));

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

        if($request->input('payload') == 3)
        {

            Event::fire(new ArticleWasApproved($article));
            
        }


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


   

}
