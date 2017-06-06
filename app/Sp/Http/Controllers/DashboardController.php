<?php

namespace Sp\Http\Controllers;

use App\Http\Requests;
use Sp\Models\Article;
use Illuminate\Http\Request;
use Sp\Repositories\AdsRepo;
use Sp\Repositories\TagsRepo;
use Sp\Repositories\UsersRepo;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
use App\Http\Controllers\Controller;
use Sp\Http\Requests\WriteArticleRequest;



class DashboardController extends Controller
{
    protected $ads_repo;

    function __construct(AdsRepo $ads_repo)
    {
        parent::__construct();
        $this->ads_repo = $ads_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersRepo $users_repo)
    {
        $user = $users_repo->getById(\Auth::user()->id);

        // return count($user->all_articles);

        $categories = array_values(array_unique(array_pluck(array_pluck($user->all_articles, 'category'), 'name')));

        $ads = $this->ads_repo->getForPage('dashboard');

        return view('dashboard.article-list', compact('user', 'categories', 'ads'));

    }


    public function create(CategoryRepo $category_repo)
    {
        if(\Auth::user()->blocked == 1) return redirect()->to("/");
        
        $ads = $this->ads_repo->getForPage('dashboard');
        $categories = $category_repo->getAllList();

        return view('dashboard.create-article', compact('categories', 'ads'));
    }

    public function store(WriteArticleRequest $request)
    {
        $data = $this->manageFields($request);

        // return strlen($request->get('body'));

        $article = $this->dispatchFrom('Sp\Commands\Article\CreateArticleCommand', $request, $data);
        flash()->success('Articolo creato con successo.');

        return redirect()->to('/dashboard/articoli/' . $article->id .'/modifica');
    }

    public function edit($id, ArticleRepo $article_repo, CategoryRepo $category_repo, TagsRepo $tags_repo)
    {
        $article = $article_repo->getById($id);

        // return $article;
    
        if(! $article ) return abort(404);

        $categories = $category_repo->getAllList();
        $tags = $tags_repo->getAll();

        $ads = $this->ads_repo->getForPage('dashboard');

        return view('dashboard.edit-article', compact('article', 'categories', 'tags', 'ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WriteArticleRequest $request, $id)
    {

        // return $request->input();
        
        $data = $this->manageFields($request);

        // return $request->input();

        $article = $this->dispatchFrom('Sp\Commands\Article\UpdateArticleCommand', $request, $data);
        flash()->success('Articolo aggiornato con successo.');

        return redirect()->to('/dashboard/articoli/' . $article->id .'/modifica');
    }

    public function preview($article_id, ArticleRepo $article_repo)
    {
        $article = $article_repo->getById($article_id);

        if(! $article || $article->user_id !== \Auth::user()->id) return abort(404);

        $ads = $this->ads_repo->getForPage('dashboard');

        return view('dashboard.anteprima', compact('article', 'ads'));

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

    public function submit($article_id, Request $request)
    {

        $article = Article::find($article_id);

        // return $article_id;

        $article->status_id = 2;
        $article->save();

        return 'true';
    }

    public function destroy(Request $request)
    {


        $article = Article::find($request->input('payload'));
        logger($article);
        if($article && $article->user_id == \Auth::user()->id && $request->input('payload'))
        {
            $article->delete();
        }

        return 'true';
    }

   

}
