<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'system'], function () {
	// Auth::routes();
	Route::get('login',function(){
		return view('auth.login');
	})->name('getLogin');
	Route::post('login','Auth\LoginController@login')->name('customLogin');
	    Route::post('customLogout','Auth\LoginController@postLogout')->name('system.customLogout');


});


