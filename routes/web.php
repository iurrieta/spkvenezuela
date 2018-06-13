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
Route::get('user/all', 'UsersController@index')->name('users')->middleware('admin');

// user detail
Route::get('user/{id}/detail', 'UsersController@show')->name('user')->middleware('admin');

// activate/deactivate users
Route::post('user/{id}/changeStatus', 'UsersController@changeStatus')->name('changeStatus')->middleware('admin');

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

// View to send email
Route::get('becomeTeacher', 'HomeController@becomeTeacher')->name('becomeTeacher');

// Send email to become a teacher
Route::post('becomeTeacherSendMail', 'HomeController@becomeTeacherSendMail')->name('becomeTeacherSendMail');

// get images
Route::get("photo_profile/{filename}", function($filename) {
    $path = storage_path("app/avatars/$filename");
    
    if (!\File::exists($path)) abort(404);
    
    $file = \File::get($path); // file
    $type = \File::mimeType($path); // type file
    
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    
    return $response;
})->name('photo_profile');