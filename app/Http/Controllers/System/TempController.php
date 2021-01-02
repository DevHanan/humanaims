<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TempUser;
class TempController extends Controller
{
    
     function __construct() {
        $this->middleware( 'permission:waiting_users', [ 'only' => [ 'index' ] ] );

    }
    public function index(){
    $users = TempUser::all();
    return view('dashboard.tempusers.index',compact('users'));
    }
}
