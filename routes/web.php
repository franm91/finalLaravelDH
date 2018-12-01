<?php

use App\Usuario;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', function () {
<<<<<<< HEAD
    $usuarios = \App\Usuario::all();
    return $usuarios;
=======
   $usuarios = \App\Usuario::all();
   return $usuarios;
>>>>>>> 5283485254bf4dc9263ba1597867a404cbb3002c
});
