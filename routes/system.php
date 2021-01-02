<?php



Route::group(['middleware'=>['auth','language']], function(){
    Route::get('translations/front','TranslationController@getFrontKey');
    Route::get('translations/back','TranslationController@getBackKey');
    Route::post('translations/postEdit','TranslationController@postEdit');
    Route::get('temp','TempController@index');

    Route::get('lang-ar', function () {
        session()->put('lang', 'ar');
        return back();
    })->name('lang-ar');

    Route::get('lang-en', function () {
        session()->put('lang', 'en');
        return back();
    })->name('lang-en');

    Route::get('dashboard', 'HomeController@index')->name('home');

    Route::put('home/update/{id}', 'HomeController@update')->name('home.update');
    Route::get('home/edit', 'HomeController@edit')->name('home.edit');

    Route::get('switch-theme', 'UserController@switchTheme')->name('switch-user-theme');

        Route::resource('specializations', 'SpecializationController');
        Route::resource('countries', 'CountryController');
                Route::resource('categories', 'CategoryController');
        Route::get('setting', 'SettingController@view');
        Route::post('setting', 'SettingController@update');
                Route::resource('doctors', 'DoctorController');
                                Route::resource('patients', 'PatientController');
                                 Route::resource('subjects', 'SubjectController');
                                Route::resource('logs', 'AuditLogsController');
  Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('pages', 'PageController');
    Route::resource('permissions', 'PermissionController');
  Route::resource('visits','VisitorController');

    Route::post('customer-create-ajax', 'CustomerController@createAjax')->name('customer-create-ajax');



});
