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
Route::get('/indonesia', 'HomeController@indonesia')->name('indonesia');
Route::get('/bebas', 'HomeController@bebas')->name('bebas');
Route::get('/cerita', 'HomeController@cerita')->name('cerita');
Route::get('/dev', 'HomeController@dev')->name('dev');


//  User Route 
Route::get('/profile/{id}/{user}', 'UserController@Profile')->name('myprofile');
Route::get('/create', 'UserController@Create')->name('Create');
Route::post('/store', 'UserController@Store')->name('store');
Route::get('/edit/profile/{id}', 'UserController@editProfile')->name('editprofile');
Route::post('/update/profile/{id}', 'UserController@update')->name('update');
Route::get('/favorite/artikel/{id_artikel}', 'SocialmediaController@favorite')->name('favorite');
Route::get('/myfavorite', 'UserController@favorite')->name('Myfavorite');
Route::get('/deletefavorite/{id}', 'SocialmediaController@delete_favorite')->name('deletefavorite');
Route::get('/follow/create/{id_target}', 'SocialmediaController@follow')->name('follow');
Route::get('/deletefollow/{id}', 'SocialmediaController@delete_follow')->name('unfollow');
Route::get('/follow', 'UserController@Follow')->name('myfollow');
Route::get('/like/artikel/{id_artikel}', 'SocialmediaController@like')->name('like');
Route::get('/deletelike/{id}', 'SocialmediaController@delete_like')->name('deletelike');






// google
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

// Blog
Route::get('detail/{id}/{slug}','BlogController@details' )->name('details');
Route::get('/delete/{id}', 'BlogController@delete')->name('delete');
Route::post('/create_comment', 'BlogController@create_comment')->name('create_comment');

//tes
// Route::get('/like', 'UserController@like')->name('like');



