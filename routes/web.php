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

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'permission'], function () {
Route::get('/admin', function () {
    return view('admin.admin_home');
})->name('admin.admin');
Route::resource('image', 'ImageController', ['except' => ['show']]);
Route::resource('category', 'CategoryGalleryController', ['except' => ['show']]);
Route::resource('post', 'PostController', ['except' => ['show']]);
Route::resource('user', 'UserController', ['except' => ['show']]);
Route::resource('role', 'RoleController', ['except' => ['show']]);
Route::post('link', 'LinkController@store')->name('refresh');
});
