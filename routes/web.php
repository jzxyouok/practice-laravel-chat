<?php

Route::get('/', function () {
    return view('welcome');
});

// Users
Route::post('signin', 'UsersController@signin');
Route::get('logout', 'UsersController@logout');
Route::group(['prefix' => 'user'], function() {
	Route::get('getUserName/{name}', 'UsersController@getUserId');
});


// Messages
Route::resource('message', 'MessagesController');
