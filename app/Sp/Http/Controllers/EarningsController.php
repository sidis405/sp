<?php

namespace Sp\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
use Sp\Repositories\UsersRepo;
use Carbon\Carbon;

class EarningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UsersRepo $users_repo, ArticleRepo $article_repo)
    {

        if(! $request->input('month'))
        {
            $start_date = Carbon::now()->format('Y-m').'-01';
        }else{
            $start_date = $this->formatStartDate($request->input('month'));
        }

        $end_date = $this->getMonthEnd($start_date);


        $start_date .= ' 00:00:00';
        $end_date .= ' 23:59:00';

        // return $end_date;

        // $start_date = '2016-06-01 00:00:00';
        // $end_date = '2016-06-30 23:59:00';

        $start_for_picker = date('m/Y', strtotime($start_date));


        $articles = $article_repo->getForUserByMonthForEarnings(\Auth::user()->id, $start_date, $end_date);

        $visits = $article_repo->getForUserByMonthForEarningsChart(\Auth::user()->id, $start_date, $end_date);

        // return $visits;

        return view('dashboard.earnings-list', compact('articles', 'visits', 'start_for_picker'));

    }

    protected function formatStartDate($input)
    {
        return join('-', array_reverse(explode("/", $input))).'-01';
    }

    protected function getMonthEnd($input)
    {
        return date('Y-m-t', strtotime($input));
    }


   

}
