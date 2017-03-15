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

Route::group(['prefix' => 'admin'], function () {
Route::get('/admin', function () {
    return view('admin.admin_home');
});
Route::resource('image', 'ImageController');
Route::resource('category', 'CategoryGalleryController');
Route::resource('post', 'PostController');
Route::resource('user', 'UserController');
Route::resource('role', 'RoleController');
Route::post('link', 'LinkController@store');
});
