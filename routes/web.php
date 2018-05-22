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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('user', 'UsersController');

// all users
Route::get('users', 'UsersController@index')->name('users');

// user profile
Route::get('profile/{id}', 'UsersController@show')->name('profile');

// update profile
Route::put('profile/{id}/update', 'UsersController@update')->name('profile.update');

// upload photo
Route::put('profile/{id}/uploadPhoto', 'UsersController@uploadPhoto')->name('profile.uploadPhoto');

// teacher page
//Route::get('teacher/{id}/detail', 'UsersController@show')->name('teacher');

//Route::get('', '')->name();
//Route::get('', '')->name();