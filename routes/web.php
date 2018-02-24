<?php

/*
|==========================================
| Web Routes, you can search them by routes
|==========================================
| #. Routes URL
| ==========================================
| 1. Index Page
| 2. Authentication
| 3. Static Pages
| 4.
| 5.
*/

Route::get('/', [ 'as' => 'home', 'uses' => 'Controller@index']);

Route::get('/create', [ 'as' => 'main.main', 'uses' => 'Resume\resumeController@create']);

Route::post('/create', [ 'as' => 'main.action', 'uses' => 'Resume\resumeController@action']);


/************************
 * 2.Authentication */
// ====================================================================
#  2.1. Register user.
// ====================================================================
Route::get('/signup', 'Auth\SignUpController@create')->name('signup-form');
Route::post('/signup', 'Auth\SignUpController@store')->name('signup-action');
// ====================================================================
#  2.2. Login user.
// ====================================================================
Route::get('/signin', 'Auth\SingInController@create')->name('signin-form');
Route::post('/signin', 'Auth\SingInController@store')->name('signin-action');
Route::get('/signout', 'Auth\SingInController@destroy')->name('signout-action');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile', [ 'as' => 'profile', 'uses' => 'resumeController@profile']);

    Route::get('/resume/', [ 'as' => 'resume.view', 'uses' => 'resumeController@viewresume']);
});



