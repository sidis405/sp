<?php

namespace Sp\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\AdsRepo;
use Sp\Repositories\UsersRepo;
use App\Http\Controllers\Controller;
use Sp\Http\Requests\UpdateUserProfileRequest;

class UsersController extends Controller
{
    protected $ads_repo;

    function __construct(AdsRepo $ads_repo)
    {
        parent::__construct();
        $this->ads_repo = $ads_repo;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_slug, UsersRepo $users_repo, AdsRepo $ads_repo)
    {
        $user = $users_repo->getBySlug($user_slug);

        if(! $user) return abort(404);

        $articles = $this->flattenByCategory($user->articles);
        $main = $users_repo->getFeaturedForProfile($user->id);

        $ads = $ads_repo->getForPage('profile');

        return view('profile.show', compact('user', 'articles', 'main', 'ads'));
    }

      public function showId($user_id, UsersRepo $users_repo,AdsRepo $ads_repo)
    {
        $user = $users_repo->getById($user_id);

        if(! $user) return abort(404);

        $articles = $this->flattenByCategory($user->articles);
        $main = $users_repo->getFeaturedForProfile($user->id);


        // return $articles;
        $ads = $ads_repo->getForPage('profile');
        
        return view('profile.show', compact('user', 'articles', 'main', 'ads'));
    }

    public function settings_form(UsersRepo $users_repo)
    {
        $user = $users_repo->getById(\Auth::user()->id);

        if(! $user) return abort(404);

        $ads = $this->ads_repo->getForPage('dashboard');

        return view('dashboard.settings', compact('user', 'ads'));
    }


    public function profile_form_save(UpdateUserProfileRequest $request)
    {
        $user = $this->dispatchFrom('Sp\Commands\Users\UpdateUserProfileCommand', $request);
        

        flash()->success('Profilo aggiornato con successo.');


        return redirect()->to('/impostazioni');

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
