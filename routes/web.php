<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::resource('usuarios', 'UserController');

Route::resource('roles', 'RolController');

Route::resource('productos', 'productoController');

Route::resource('categorias', 'CategoriaController');