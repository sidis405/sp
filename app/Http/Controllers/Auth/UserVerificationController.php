<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Sp\Models\Category;
use Sp\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserVerificationController extends Controller
{

	public function __construct()
	{
	    view()->share('navCategories', Category::whereActive(1)->orderBy('id', 'ASC')->get());
	    view()->share('siteSettings', Settings::first());
	}

    public function update($token)
    {
        $user = User::where('email_verification_token', $token)->where('active', 0)->first();

        if(! $user) return view('verification.fail');

        $user->active = 1;
        $user->save();

        return view('verification.success');
    }
}
