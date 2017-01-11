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

    public function show($id, PaymentsRepo $payments_repo)
     {
        $payment_request = $payments_repo->getById($id);

        $user_requests = $payments_repo->getRequestsForUser($payment_request->user_id);

        return view('admin.payment-requests.show', compact('payment_request', 'user_requests'));

     } 

     public function update($id, PaymentsRepo $payments_repo, Request $request)
     {
        $payment_request = $payments_repo->getById($id);

        $data = ['paid_on' => Carbon::now(), 'payment_status_id' => 1];

        $payment_request->update($data);

        flash()->success('Metodo aggiornato con successo.');


        return redirect()->to('/admin/pagamenti/' . $id);

     }

}
