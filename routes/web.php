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
    
    if (Auth::check())
    {
        return redirect('/teacher/all');
    }
    else
    {
        return view('welcome');
    }
});

Auth::routes();

// all users
Route::get('user/all', 'UsersController@index')->name('users');

// user detail
Route::get('user/{id}/detail', 'UsersController@show')->name('user');

// activate/deactivate users
Route::post('user/{id}/changeStatus', 'UsersController@changeStatus')->name('changeStatus');

// user profile
Route::get('profile/{id}', 'UsersController@show')->name('profile');

// update profile
Route::put('profile/{id}/update', 'UsersController@update')->name('profile.update');

// upload photo
Route::put('profile/{id}/uploadPhoto', 'UsersController@uploadPhoto')->name('profile.uploadPhoto');

// teacher all
Route::get('teacher/all', 'HomeController@index')->name('teachers');

// teacher page
Route::get('teacher/{id}/detail', 'UsersController@teacherView')->name('teacher');

// add comment
Route::post('teacher/comment', 'CommentsController@store')->name('comment');

// add rate
Route::post('teacher/rate', 'RatesController@store')->name('rate');