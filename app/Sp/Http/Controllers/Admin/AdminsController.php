<?php

namespace Sp\Http\Controllers\Admin;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\UsersRepo;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
use App\Http\Controllers\Controller;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersRepo $users_repo)
    {
        $users = $users_repo->getAdminAllForListing();

        return view('admin.admins.index', compact('users'));

    }

    public function show($user_id, UsersRepo $users_repo)
    {
        $user = $users_repo->getById($user_id);

        return view('admin.admins.show', compact('user'));

    }

    public function create(Request $request)
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ];

        $this->validate($request, $rules);

        $input = $request->only('name', 'surname', 'username', 'email', 'password');
        $input['active'] = 1;
        $input['role'] = 'admin';
        $input['password'] = bcrypt($input['password']);

        User::create($input);

        return redirect()->to('/admin/amministratori');
    }

    public function update($user_id, $status, Request $request)
    {

        $user = User::where('role', 'user')->whereId($user_id)->first();

        // return $user_id;

        $user->blocked = $status;
        $user->save();

        if($status == 1){
            flash('Utente sbloccato con successo', 'success');
        }elseif($status == 2){
            flash('Utente bloccato con successo', 'warning');
        }

        return redirect()->to('/admin/utenti');
    }

    public function destroy($user_id, Request $request)
    {

        $user = User::where('role', 'user')->whereId($user_id)->first();

        // return $user_id;

        $user->active = 0;
        $user->save();

        return redirect()->to('/admin/utenti');
    }

}
