<?php

use App\Usuario;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', function () {
   $usuarios = \App\Usuario::all();
   return $usuarios;
});
