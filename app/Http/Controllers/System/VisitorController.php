<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Visit;


class VisitorController extends Controller
{
    
function __construct() {
        $this->middleware( 'permission:list_visits', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:show_visit', [ 'only' => [ 'show'] ] );
        $this->middleware( 'permission:delete_visit', [ 'only' => [ 'destroy' ] ] );
    }

    public function index(){
    	$visits = Visit::latest()->get();
        return view('dashboard.visits.index',compact('visits'));
    }

public function show($id){
	$visit = Visit::find($id);
        return view('dashboard.visits.show',compact('visit'));
}

 public function destroy($id)
    {
        $visit= Visit::findOrFail($id);
        $visit->delete();
        toast(__('Data Deleted successfully'),'success');
        return redirect(route('system.visits.index'));
    }

}
