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
    return redirect(Route('home'));
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
Route::get('/like/artikel/{id_artikel}/{id_author}', 'SocialmediaController@like')->name('like');
Route::get('/deletelike/{id}', 'SocialmediaController@delete_like')->name('deletelike');

Route::get('/ceklike/{idUser}/{idBlog}','SocialmediaController@cekLike')->name('cekLike');
Route::get('/cekbookmark/{idUser}/{idBlog}','SocialmediaController@cekBookmark')->name('cekBookmark');

// api
Route::get('/userid', 'UserController@userId');



// google
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

// Blog
Route::get('d/{id}/{slug}','BlogController@details' )->name('details');
Route::get('/delete/{id}', 'BlogController@delete')->name('delete');
Route::post('/create_comment', 'BlogController@create_comment')->name('create_comment');


// admin
Route::get('/admin/login', 'AdminLoginController@showLoginForm');
Route::post('/admin/login/submit', 'AdminLoginController@login')->name('admin.login');
Route::get('/admin/logout', 'AdminLoginController@logout')->name('admin.logout');
Route::get('/admin/home' , 'AdminController@home')->middleware('auth:admin')->name('admin.home');
Route::get('/admin/delete/user/{id}' , 'AdminController@DeleteUser')->middleware('auth:admin')->name('delete.user');
Route::get('/admin/delete/blog/{id}' , 'AdminController@delete')->middleware('auth:admin')->name('admin.delete');
Route::get('/admin/edit/blog/{id}' , 'AdminController@edit')->middleware('auth:admin')->name('admin.edit');
Route::post('/admin/upload/blog/{id}' , 'AdminController@upload')->middleware('auth:admin')->name('admin.upload');

// AllAPI

Route::get('/api/d/{id}/{slug}','ApiController@details' )->name('api.details');
Route::get('/api/profile/{id}/{user}', 'ApiController@Profile')->name('api.myprofile');




