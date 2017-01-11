<?php

namespace Sp\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Models\Settings;
use Sp\Repositories\SettingsRepo;


class SettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SettingsRepo $settings_repo)
    {
        $settings = $settings_repo->getSettings();

        return view('admin.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->only('allow_registration');

        $settings = Settings::find(1);

        $settings->update($input);

        flash()->success('Impostazioni aggiornate con successo.');

        return redirect()->to('/admin/impostazioni');
    }
}
