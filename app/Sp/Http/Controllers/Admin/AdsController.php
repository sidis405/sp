<?php

namespace Sp\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Models\Ads;
use Sp\Repositories\AdsRepo;


class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdsRepo $ads_repo)
    {
        $ads = $ads_repo->getAll();

        return view('admin.ads.index', compact('ads'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, AdsRepo $ads_repo)
    {
        $ad = $ads_repo->getById($id);

        // return $ad;

        return view('admin.ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
    
        $ad = Ads::find($request->get('ad_id'));

        $ad->update($request->only('content', 'active'));

        flash()->success('Ad aggiornato con successo.');


        return redirect()->to('/admin/ads/' . $ad->id .'/modifica');
    }

}
