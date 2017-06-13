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
Route::group(['prefix' => 'post'], function(){
  Route::get('{id}', 'HomeController@getPost')->name('post');
  Route::get('{id}/category', 'HomeController@getPostByCategory')->name('post.category');
  Route::get('{id}/user', 'HomeController@getPostByUser')->name('post.user');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
  Route::get('/', function(){
    return view('pages.admin.index');
  })->name('admin');

  Route::resource('category', 'CategoryController', ['names' => 'admin.category']);
  Route::resource('post', 'PostController', ['names' => 'admin.post']);
});

// Route::get('/home', 'HomeController@index')->name('home');
