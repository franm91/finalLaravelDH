<?php

Route::get('/', function(){
   return redirect('/index');
});

Route::middleware('auth')->group(function ()
{
	Route::get('/posts/create', 'PostsController@create')->name('posts.create');
	Route::delete('/posts/{id}', 'PostsController@destroy')->name('posts.destroy');
	Route::get('/posts/{id}/edit', 'PostsController@edit')->name('posts.edit');
	Route::get('/posts', 'PostsController@index')->name('posts.index');
	Route::get('/posts/{id}', 'PostsController@show')->name('posts.show');
});

Route::resource('/posts', 'PostsController')->except(['create', 'destroy', 'edit', 'index', 'show']);

Auth::routes();

Route::get('/profile', 'Auth\LoginController@showProfile')->name('profile')->middleware('auth');

Route::get('/index', 'HomeController@index')->name('home');


