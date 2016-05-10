<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Eagle\Eagle;
use Illuminate\Http\Request;

class EagleController extends Controller
{
    

    public function index()
    {
        return view('eagle.index');
    }


    public function make(Eagle $eagle)
    {
        return $eagle->build();
    }
}
