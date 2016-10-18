<?php

namespace Sp\Http\Controllers;

use Event;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\TopicsRepo;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TopicsRepo $topics_repo)
    {
        $topics = $topics_repo->getAll();

        return view('topics.index', compact('topics'));

    }

}
