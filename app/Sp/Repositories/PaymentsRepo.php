<?php

namespace Sp\Repositories;

use Carbon\Carbon;
use Sp\Models\PaymentRequests;
use Sp\Models\Visits;


class PaymentsRepo
{

    public function getRequestsForUser($user_id)
    {
        return PaymentRequests::where('user_id', $user_id)->with('status')->orderBy('timestamp', 'ASC')->get();
    }

    public function getById($id)
    {
        return PaymentRequests::where('id', $id)->with('user', 'status')->firstOrFail();
    }

    public function getRequests()
    {
        return PaymentRequests::with('status', 'user')->orderBy('created_at', 'DESC')->get();
    }

    public function make_request($user_id, $timestamp)
    {
        if(!$this->getByUserAndTimestamp($user_id, $timestamp))
        {
            $request = new PaymentRequests;
            $request->user_id = $user_id;
            $request->timestamp = $timestamp;
            $request->payment_status_id = 2;

            $request->amount = $this->getForUserForMonthEarnings($user_id, $timestamp);

            $request->save();

        }
    }

    public function getByUserAndTimestamp($user_id, $timestamp)
    {
        return PaymentRequests::where('user_id', $user_id)->where('timestamp', $timestamp)->first();
    }

    public function getForUserForMonthEarnings($user_id, $timestamp){

           $visits = Visits::where('created_at', '>=', $timestamp)->whereHas('article', function($q) use ($user_id) {

                $q = $q->where('user_id', $user_id);

           })->where('created_at', '<=', date('Y-m-t', strtotime($timestamp)))->orderBy('created_at', 'ASC')->get();


            // $out = [];

            // foreach ($visits as $dt => $data) {


            //     $month = $dt . '-01';

            //     $val = count(@$visits[$dt]);
            //     if(@$visits[$dt])
            //     {
            //         $pay = array_sum(array_values(array_pluck(@$visits[$dt]->toArray(), 'payoff')));
                    
            //     }else{
            //         $pay = 0.00;
            //     }

            //     $out[$month] = ['visits' => $val, 'payoff' => $pay];
            // }


        return array_sum(array_values(array_pluck($visits->toArray(), 'payoff')));
    }
}
