<?php

namespace Sp\Http\Controllers;

use Illuminate\Http\Request;
use Sp\Repositories\AdsRepo;
use Sp\Repositories\UsersRepo;
use App\Http\Controllers\Controller;
use Sp\Http\Requests\UpdateUserProfileRequest;

class UsersController extends Controller
{
    protected $ads_repo;

    public function __construct(AdsRepo $ads_repo)
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

        if (! $user) {
            return abort(404);
        }

        $articles = $this->flattenByCategory($user->articles);
        $main = $users_repo->getFeaturedForProfile($user->id);

        $ads = $ads_repo->getForPage('profile');

        return view('profile.show', compact('user', 'articles', 'main', 'ads'));
    }

    public function showId($user_id, UsersRepo $users_repo, AdsRepo $ads_repo)
    {
        $user = $users_repo->getById($user_id);

        if (! $user) {
            return abort(404);
        }

        $articles = $this->flattenByCategory($user->articles);
        $main = $users_repo->getFeaturedForProfile($user->id);


        // return $articles;
        $ads = $ads_repo->getForPage('profile');

        return view('profile.show', compact('user', 'articles', 'main', 'ads'));
    }

    public function settings_form(UsersRepo $users_repo)
    {
        $user = $users_repo->getById(\Auth::user()->id);

        if (! $user) {
            return abort(404);
        }

        $ads = $this->ads_repo->getForPage('dashboard');

        return view('dashboard.settings', compact('user', 'ads'));
    }

    public function paymethods_form_save(Request $request)
    {
        // return $request->all();

        $this->validate($request, ['pay-method' => 'required']);

        $input = $request->all();

        if ($input['pay-method'] == 'payment_iban') {
            $data = [
                'payment_iban' => 1,
                'payment_paypal' => 0,
                // 'payment_detail_paypal_email' => null,
                'payment_detail_iban_name'=> $input['payment_detail_iban_name'],
                'payment_detail_iban_surname'=> $input['payment_detail_iban_surname'],
                'payment_detail_iban_number'=> $input['payment_detail_iban_number'],
            ];
        } else {
            $data = [
                    'payment_paypal' => 1,
                    'payment_iban' => 0,
                    'payment_detail_paypal_email' => $input['payment_detail_paypal_email'],
                    // 'payment_detail_iban_name'=> null,
                    // 'payment_detail_iban_surname'=> null,
                    // 'payment_detail_iban_number'=> null,
                ];
        }

        $user = \Auth::user();

        $user->update($data);

        flash()->success('Metodo aggiornato con successo.');


        return redirect()->to('/impostazioni#metodi');
    }

    public function profile_form_save(UpdateUserProfileRequest $request)
    {

        // return $request->all();
        $data = $this->manageFields($request);


        $user = $this->dispatchFrom('Sp\Commands\Users\UpdateUserProfileCommand', $request, $data);


        flash()->success('Profilo aggiornato con successo.');


        return redirect()->to('/impostazioni');
    }

    public function manageFields(Request $request)
    {
        $data = [];

        if ($request->hasFile('profileImage')) {
            $data['file'] = $request->file('profileImage');
        } else {
            $data['file'] = null;
        }

        return $data;
    }

    public function flattenByCategory($articles)
    {
        $data = [];

        foreach ($articles as $article) {
            if (!isset($data[$article->category->name])) {
                $data[$article->category->name] = [];
            }
            $data[$article->category->name][] = $article;
        }
        array_multisort(array_map('count', $data), SORT_DESC, $data);
        return $data;
    }
}
