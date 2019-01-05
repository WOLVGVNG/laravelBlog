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

// Pages Controller
  Route::get('/', 'PagesController@getIndex');
  Route::get('/about', 'PagesController@getAbout');
  Route::get('/contact', 'PagesController@getContact');

  Route::post('contact', 'PagesController@postContact');




// Post Controller
  Route::resource('posts', 'PostController');



  
// Blog Controller
  Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
  Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);




// Authentication
  Auth::routes();
  Route::get('/home', 'HomeController@index')->name('home');




// Super Users Controller
  Route::resource('superusers', 'SuperUsersController');




// Comments Controller
  Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
  Route::delete('comments/{post_id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
  Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);