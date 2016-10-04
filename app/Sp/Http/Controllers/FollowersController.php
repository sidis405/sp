<?php

namespace Sp\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sp\Repositories\FollowersRepo;


class FollowersController extends Controller
{

    

    public function follow(Request $request, FollowersRepo $followers_repo)
    {
        $id = $request->input('payload');

        $followers_repo->follow($id);

        return 'true';
    }

    public function unfollow(Request $request, FollowersRepo $followers_repo)
    {
        $id = $request->input('payload');

        $followers_repo->unfollow($id);

        return 'true';
    }

}
