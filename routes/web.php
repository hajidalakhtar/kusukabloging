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
    // return view('welcome');
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//  User Route 
Route::get('/profile/{id}/{user}', 'UserController@Profile')->name('myprofile');
Route::get('/create', 'UserController@Create')->name('Create');
Route::post('/store', 'UserController@Store')->name('store');
Route::get('/edit/profile', 'UserController@editProfile')->name('editprofile');

// google
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

// Blog
Route::get('detail/{slug}','BlogController@details' )->name('details');
Route::get('/delete/{id}', 'BlogController@delete')->name('delete');
Route::post('/create_comment', 'BlogController@create_comment')->name('create_comment');


