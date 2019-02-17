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

//  User Root 
Route::get('/profile/{user}', 'UserController@Profile')->name('myprofile');
Route::get('/create', 'UserController@Create')->name('Create');
Route::post('/store', 'UserController@Store')->name('store');

// Blog
Route::get('detail/{slug}','BlogController@details' )->name('details');



