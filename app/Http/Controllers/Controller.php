<?php

namespace App\Http\Controllers;

use Auth;
use Sp\Models\Category;
use Sp\Models\Settings;
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

        view()->share('navCategories', Category::whereActive(1)->orderBy('id', 'ASC')->get());
        view()->share('currentUser', $user);
        view()->share('siteSettings', Settings::first());

        
    }
}
