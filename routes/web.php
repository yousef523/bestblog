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

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');

Route::get('/posts','PostsController@index');
Route::get('/posts/create','PostsController@create');
Route::post('/posts','PostsController@store');
Route::get('/posts/{id}','PostsController@show');

Route::get('/posts/{id}/edit','PostsController@edit');
Route::put('/posts/{id}','PostsController@update');

Route::delete('/posts/{id}','PostsController@destroy')->name('posts.destroy');




Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('home');
