<?php

namespace Sp\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\AdsRepo;
use Sp\Repositories\UsersRepo;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\CategoryRepo;
use Sp\Repositories\PaymentsRepo;
use App\Http\Controllers\Controller;

class EarningsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentsRepo $payments_repo)
    {

        $requests = $payments_repo->getRequests();

        // return $requests[0]->status;

        return view('admin.payment-requests.index', compact('requests'));

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

        $ads = $this->ads_repo->getForPage('dashboard');


        return view('dashboard.earnings-request-list', compact('visits', 'requests', 'ads'));

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
