<?php

namespace Sp\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Sp\Repositories\UsersRepo;
use App\Http\Controllers\Controller;

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

    public function show($user_id, UsersRepo $users_repo)
    {
        $user = $users_repo->getById($user_id);


        return view('admin.users.show', compact('user'));
    }

    public function update($user_id, $status, Request $request)
    {
        $user = User::where('role', 'user')->whereId($user_id)->first();

        // return $user_id;

        $user->blocked = $status;
        $user->save();

        if ($status == 1) {
            flash('Utente sbloccato con successo', 'success');
        } elseif ($status == 2) {
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
