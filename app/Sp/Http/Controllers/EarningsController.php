<?php

namespace Sp\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
use Sp\Repositories\PaymentsRepo;
use Sp\Repositories\UsersRepo;

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

    public function listingPerMonth(ArticleRepo $article_repo, PaymentsRepo $payments_repo)
    {
        $visits = $article_repo->getForUserByMonthEarnings(\Auth::user()->id);

        $requests = $payments_repo->getRequestsForUser(\Auth::user()->id);

        $visits = $this->normalizeListing($visits, $requests);

        return view('dashboard.earnings-request-list', compact('visits', 'requests'));

    }

    public function normalizeListing($visits, $requests)
    {
        $out = [];

        $requests = $this->flattenByTimeStamp($requests);



        foreach ($visits as $timestamp => $month) {
           if($this->checkCurrentMonth($timestamp))
           {
            $current = $month;

            if(isset($requests[$timestamp]))
            {
                $current['id'] = $requests[$timestamp]->id;
                $current['status'] = $requests[$timestamp]->status->name;
                $current['status-slug'] = $requests[$timestamp]->status->slug;
            }else{
                $current['id'] = null;
                $current['status'] = null;
                $current['status-slug'] = null;
            }

            $out[$timestamp] = $current;

           }
        }
        return $out;
    }

    public function flattenByTimeStamp($requests)
    {
        $out = [];

        foreach ($requests as $request) {
            $out[$request->timestamp] = $request;
        }

        return $out;
    }

    public function checkCurrentMonth($month)
    {
        $now = new Carbon('first day of this month');
        $current = $now->format('Y-m-d');


        if(strtotime($current) > strtotime($month))
        {
            return true;
        }

        return false;

    }

    public function makePaymentRequest(Request $request,PaymentsRepo $payments_repo)
    {
        $user_id = \Auth::user()->id;
        $timestamp = base64_decode($request->input('payload'));

        $payments_repo->make_request($user_id, $timestamp);

        return 'true';
    }


   

}
