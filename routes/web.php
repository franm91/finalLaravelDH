<?php

Route::get('/', function(){
   return redirect('/index');
});

Route::middleware('auth')->group(function ()
{
	Route::get('/posts/create', 'PostsController@create')->name('posts.create');
	Route::get('/posts/{id}/edit', 'PostsController@edit')->name('posts.edit');
	Route::delete('/posts/{id}', 'PostsController@destroy')->name('posts.destroy');
	Route::get('/posts/{id}', 'PostsController@show')->name('posts.show');
	Route::get('/posts', 'PostsController@index')->name('posts.index');
});

Route::resource('/posts', 'PostsController')->except(['create', 'destroy', 'edit', 'index', 'show']);

Auth::routes();

Route::get('/profile', 'HomeController@showProfile')->name('profile');

Route::get('/index', 'HomeController@index')->name('home');

Route::get('/faq', 'HomeController@faq');

Route::get('/country/{id}', 'PostsController@byCountry')->name('country.country');
