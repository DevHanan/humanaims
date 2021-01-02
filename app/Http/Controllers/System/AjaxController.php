<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;
use App;
class AjaxController extends Controller
{
    public function getStatesByCountry(Request $request){
    	$states = State::where('country_id' , $request->id)->get()->pluck('name','id')->ToArray();
    	return $states;
    }
}
