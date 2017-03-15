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
<<<<<<< HEAD
Route::post('link', 'LinkController@store');
});
=======
Route::patch('routerefresh', 'RouteRefreshControll@index');
>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
