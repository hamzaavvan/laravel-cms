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

Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/tickets', 'TicketsController@index');

Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/ticket/{slug?}/edit', 'TicketsController@edit');
Route::post('/ticket/{slug?}/edit', 'TicketsController@update');
Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy');

Route::get('tickets/create', 'TicketsController@create');
Route::post('tickets/create', 'TicketsController@store');

Route::post('/comment', 'CommentsController@newComment');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('users/register', 'Auth\RegisterController@register');

Route::get('users/logout', 'Auth\LoginController@logout');

Route::get('users/login', 'Auth\LoginController@showLoginForm');
Route::post('users/login', 'Auth\LoginController@login');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'], function() {
	Route::get('roles', 'RolesController@index');
	Route::get('roles/create', 'RolesController@create');
	Route::post('roles/create', 'RolesController@store');

	Route::get('users', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
	Route::get('users/{id?}/edit', 'UserController@edit');
	Route::post('users/{id?}/edit', 'UserController@update');

	Route::get('/', 'PagesController@home');

	Route::get('posts', 'PostsController@index');
	Route::get('posts/create', 'PostsController@create');
	Route::post('posts/create', 'PostsController@store');
	Route::get('posts/{id?}/edit', 'PostsController@edit');
	Route::post('posts/{id?}/edit','PostsController@update');
});