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

Route::get('/', 'PostsController@getIndex');
Route::get('/single', 'PostsController@getSingle');
Route::get('/category', 'PostsController@getCategory');
Route::get('/categories', 'PostsController@getCategories');
Route::get('/about', 'PostsController@getAbout');

/*
 * Administrations routes
 */
Route::get('/admin/login', 'Auth\LoginController@showLoginForm');
Route::post('/admin/login', 'Auth\LoginController@login')->name('login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/admin/logout', 'Auth\LoginController@logout');

Route::get('/admin/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/admin/register', 'Auth\RegisterController@register')->name('register');
Route::get('/admin/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/admin/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/admin/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');


Route::group(['prefix'=> 'admin', 'as' => 'admin.'], function (){
    Route::resource('blog', 'Admin\PostsController');
    Route::resource('category', 'Admin\CategoriesController');
    Route::resource('navbar', 'Admin\NavbarController');
});
