<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




    Route::get('categories','Api\MainController@categories');
    Route::get('regions','Api\MainController@regions');
    Route::get('sliders','Api\MainController@sliders');
    Route::get('traffic-lines','Api\MainController@trafficLines');
    Route::post('contact','Api\MainController@contact');
    Route::get('contact-types','Api\MainController@contactTypes');

        Route::post('register', 'Api\AuthController@register');
        Route::post('login', 'Api\AuthController@login');
        Route::post('reset-password', 'Api\AuthController@reset');
        Route::post('new-password', 'Api\AuthController@password');
        Route::get('about-us','Api\MainController@aboutUs');
        Route::get('privacy','Api\MainController@privacy');
        Route::get('terms_conditions','Api\MainController@termsConditions');

        Route::group(['middleware'=>'auth:api'],function(){
            Route::post('profile', 'Api\Client\AuthController@profile');
            Route::post('register-token', 'Api\Client\AuthController@registerToken');
            Route::post('remove-token', 'Api\Client\AuthController@removeToken');
            Route::get('notifications','Api\Client\MainController@notifications');

            Route::get('realstates','Api\MainController@realstates');
            Route::get('realstate','Api\MainController@realstate');
            Route::get('my-realstates','Api\MainController@myRealstates');
            Route::get('my-favourites','Api\MainController@myFavourites');
            Route::post('add-realstate','Api\MainController@addRealstate');
            Route::post('delete-realstates','Api\MainController@deleteRealstates');
            Route::post('favourite-realstate','Api\MainController@favouriteRealstate');
            Route::post('un-favourite-realstate','Api\MainController@unFavouriteRealstate');
            Route::post('report-realstate','Api\MainController@reportRealstate');
        });
  
?>
