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
    return view('Auth/login');
});

Auth::routes();

Route::post('/post', 'PostController@sendPost')->name('SendPost');
Route::post('/comment', 'CommentController@sendComment')->name('SendComment');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_avatar')->name('avatar');
