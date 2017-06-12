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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{id}', 'HomeController@getPost')->name('post');
Route::get('/post/{id}/category', 'HomeController@getPostByCategory')->name('post.category');
Route::get('/post/{id}/user', 'HomeController@getPostByUser')->name('post.user');

// Route::get('/home', 'HomeController@index')->name('home');
