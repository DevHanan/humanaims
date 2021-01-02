<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Requests\SettingRequest;


class SettingController extends Controller
{
    
     function __construct() {
        $this->middleware( 'permission:update_settings', [ 'only' => [ 'update','view' ] ] );
    }

    public function update(SettingRequest $request)
    {
        if (Setting::all()->count() > 0)
        {
            Setting::find(1)->update($request->all());
        }else{
            Setting::create($request->all());
        }
        toast(__('back.Settings has been edited successfully'),'success');

        return back();
    }

    public function view(Setting $model)
    {
        if ($model->all()->count() > 0)
        {
            $model = Setting::find(1);
        }
        return view('dashboard.settings.view', compact('model'));
    }
}
