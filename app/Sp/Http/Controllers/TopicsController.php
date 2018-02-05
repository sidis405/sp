<?php

namespace Sp\Http\Controllers;

use Sp\Models\Topics;
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
        $topics = $topics_repo->getAllFrontForday();

        return view('topics.index', compact('topics'));
    }
}
