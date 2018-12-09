<?php

Auth::routes();

Route::get('/', function(){
   return redirect()->route('home');
});

Route::resource('/posts','PostsController');

Route::get('/home', 'HomeController@index')->name('home');

