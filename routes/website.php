<?php


	
Route::group(['middleware'=>['language','Shetabit\Visitor\Middlewares\LogVisits']], function () {

	Route::get('/', function () {
    return view('website.auth.login');
});
Route::post('/login', 'AuthController@login')->name('login');  
Route::get('/signin', 'AuthController@getRegister');
Route::post('/signin', 'AuthController@postRegister')->name('signin');
Route::post('/resend-code', 'AuthController@ResendCode')->name('resendVerifyCode');
Route::post('/verify-account', 'AuthController@verifyAccount')->name('Verifyaccount');
Route::post('/user-membership', 'AuthController@userMembership')->name('userMembership');
 Route::get('logout','AuthController@logout')->name('siteLogout');
	 Route::get('lang-ar', function () {
        session()->put('lang', 'ar');
        return back();
    })->name('lang-ar');

    Route::get('lang-en', function () {
        session()->put('lang', 'en');
        return back();
    })->name('lang-en');

Route::group(['middleware'=>['auth:member']], function () {

    //   Route::any('user/notifications/get', 'NotificationsController@getNotifications');
    // Route::any('user/notifications/read', 'NotificationsController@markAsRead');
    // Route::any('user/notifications/read/{id}', 'NotificationsController@markAsReadAndRedirect');

    Route::get('/notifications', 'FrontController@notifications');
    Route::get('/get-unread-msg','FrontController@getUnreadMsg');
Route::get('/terms', function () {
    return view('website.terms');
});


Route::get('/settings', function () {
    return view('website.settings');
});

Route::resource('comments','CommentController');
    Route::get('/notifications', 'FrontController@notifications');
Route::get('/doctors','FrontController@listDoctors');
Route::get('/users', 'FrontController@listPatients');
Route::get('/home', 'FrontController@home')->name('home');
Route::post('/subject/store', 'FrontController@storeSubject')->name('subject.store');
Route::post('/share-subject', 'FrontController@shareSubject')->name('subject.share');
Route::post('favourite-unfavourite-subj', 'FrontController@favouriteToggle')->name('favunfavsubj');
Route::post('follow-unfollow', 'FrontController@followToggole')->name('followunfollow');

Route::post('subject-increment-view','FrontController@SubjectView');
// Like Or Dislike
Route::post('like_subject','FrontController@likeSubject');
Route::post('dislike_subject','FrontController@disLikeSubject');

Route::get('/message', function () {
    return view('website.messages');
});
Route::get('/profile', 'FrontController@profile');
Route::get('/show-profile/{id}', 'FrontController@showProfile');

Route::post('edit-profile','AuthController@profile');
Route::post('edit-password','AuthController@changePassword');
Route::post('comment','FrontController@comment');
Route::post('rate', 'FrontController@rate')->name('rate');

/**
 * -----------------------------------------------------------------
 * NOTE : There is two routes has a name (user & group),
 * any change in these two route's name may cause an issue
 * if not modified in all places that used in (e.g Chatify class,
 * Controllers, chatify javascript file...).
 * -----------------------------------------------------------------
 */


/*
* This is the main app route [Chatify Messenger]
*/
// Route::get('/chatify', 'MessagesController@index');

// /**
//  *  Fetch info for specific id [user/group]
//  */
// Route::post('/idInfo', 'MessagesController@idFetchData');

// /**
//  * Send message route
//  */
// Route::post('/sendMessage', 'MessagesController@send')->name('send.message');

// /**
//  * Fetch messages 
//  */
// Route::post('/fetchMessages', 'MessagesController@fetch')->name('fetch.messages');

// /**
//  * Download attachments route to create a downloadable links
//  */
// Route::get('/download/{fileName}', 'MessagesController@download')->name(config('chatify.attachments.route'));

// /**
//  * Authintication for pusher private channels
//  */
// Route::post('/chat/auth', 'MessagesController@pusherAuth')->name('pusher.auth');

// /**
//  * Make messages as seen
//  */
// Route::post('/makeSeen', 'MessagesController@seen')->name('messages.seen');

// /**
//  * Get contacts
//  */
// Route::post('/getContacts', 'MessagesController@getContacts')->name('contacts.get');

// /**
//  * Update contact item data
//  */
// Route::post('/updateContacts', 'MessagesController@updateContactItem')->name('contacts.update');


// /**
//  * Star in favorite list
//  */
// Route::post('/star', 'MessagesController@favorite')->name('star');

// /**
//  * get favorites list
//  */
// Route::post('/favorites', 'MessagesController@getFavorites')->name('favorites');

// /**
//  * Search in messenger
//  */
// Route::post('/search', 'MessagesController@search')->name('search');

// /**
//  * Get shared photos
//  */
// Route::post('/shared', 'MessagesController@sharedPhotos')->name('shared');

// /**
//  * Delete Conversation
//  */
// Route::post('/deleteConversation', 'MessagesController@deleteConversation')->name('conversation.delete');

// /**
//  * Delete Conversation
//  */
// Route::post('/updateSettings', 'MessagesController@updateSettings')->name('avatar.update');

// /**
//  * Set active status
//  */
// Route::post('/setActiveStatus', 'MessagesController@setActiveStatus')->name('activeStatus.set');






// /*
// * [Group] view by id
// */
// Route::get('/group/{id}', 'MessagesController@index')->name('group');

// /*
// * user view by id.
// * Note : If you added routes after the [User] which is the below one,
// * it will considered as user id.
// *
// * e.g. - The commented routes below :
// */
// // Route::get('/route', function(){ return 'Munaf'; }); // works as a route
// Route::get('/{id}', 'MessagesController@index')->name('user');
// Route::get('/route', function(){ return 'Munaf'; }); // works as a user id


});

});