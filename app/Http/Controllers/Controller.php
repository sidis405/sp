<?php

namespace App\Http\Controllers;

use Auth;
use Sp\Repositories\TopicsRepo;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {

        $user = \Auth::user();

        if($user){

        	view()->share('day_topics', TopicsRepo::getAllFront());
        	
        }

        view()->share('currentUser', $user);

        
    }
}
