<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Kusukabloging Route 
|
*/





/*
|--------------------------------------------------------------------------
| Clear Cache
|--------------------------------------------------------------------------
| kalo error bersihin cache nya 
|
*/
Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
 
});

/*
|--------------------------------------------------------------------------
| home Route
|--------------------------------------------------------------------------
| Semua Route untuk Home
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


/*
|--------------------------------------------------------------------------
| User Route
|--------------------------------------------------------------------------
| Semua Route untuk User
|
*/
Route::get('/profile/{id}/{user}', 'UserController@Profile')->name('myprofile');
Route::get('/create', 'BlogController@Create')->name('Create');
Route::post('/store', 'BlogController@Store')->name('store');
Route::get('/delete/{id}', 'BlogController@delete')->name('delete');
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

/*
|--------------------------------------------------------------------------
| Transaksi Route
|--------------------------------------------------------------------------
| Semua Route untuk Transaksi
|
*/
Route::get('/buymember','TransaksiController@buymember')->name('buymember');
Route::get('/prosesBeli','TransaksiController@prosesBeli')->name('prosesBeli');
Route::get('/pro/pembayaran/{kode}','TransaksiController@formBuy')->name('formbuy');
Route::post('/uploadBukti/{kode}','TransaksiController@uploadBukti')->name('uploadBukti');
Route::get('/terimaPro/{kode}','AdminController@terimaPro')->name('terimaPro');


/*
|--------------------------------------------------------------------------
| Api Route
|--------------------------------------------------------------------------
| Semua Route untuk Api
|
*/
Route::get('/userid', 'ApiController@userId');
Route::get('/api/d/{id}','ApiController@details' )->name('api.details');
Route::get('/api/blog/all','ApiController@allBlog' )->name('api.allBlog');
Route::get('/api/profile/{id}/{user}', 'ApiController@Profile')->name('api.myprofile');
Route::get('/api/indonesia', 'ApiController@indonesia')->name('api.indonesia');
Route::get('/api/bebas', 'ApiController@bebas')->name('api.bebas');
Route::get('/api/cerita', 'ApiController@cerita')->name('api.cerita');
Route::get('/api/dev', 'ApiController@dev')->name('api.dev');





/*
|--------------------------------------------------------------------------
| Google Login Route
|--------------------------------------------------------------------------
| Semua Route untuk longin Mengunakan google
|
*/
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

/*
|--------------------------------------------------------------------------
| blog Route
|--------------------------------------------------------------------------
| Semua Route untuk blog
|
*/
Route::get('d/{id}/{slug}','BlogController@details' )->name('details');
Route::post('/create_comment', 'BlogController@create_comment')->name('create_comment');


/*
|--------------------------------------------------------------------------
| admin Route
|--------------------------------------------------------------------------
| Semua Route untuk admin
|
*/
Route::get('/admin/login', 'AdminLoginController@showLoginForm');
Route::post('/admin/login/submit', 'AdminLoginController@login')->name('admin.login');
Route::get('/admin/logout', 'AdminLoginController@logout')->name('admin.logout');
Route::get('/admin/home' , 'HomeController@adminHome')->middleware('auth:admin')->name('admin.home');
Route::get('/admin/delete/user/{id}' , 'AdminController@deleteUser')->middleware('auth:admin')->name('delete.user');
Route::get('/admin/delete/blog/{id}' , 'AdminController@adminDeleteBlog')->middleware('auth:admin')->name('admin.delete');
Route::get('/admin/edit/blog/{id}' , 'AdminController@edit')->middleware('auth:admin')->name('admin.edit');
Route::post('/admin/upload/blog/{id}' , 'AdminController@upload')->middleware('auth:admin')->name('admin.upload');



