<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::resource('usuarios', 'UserController');

Route::resource('roles', 'RolController');

Route::resource('productos', 'productoController');

Route::resource('categorias', 'CategoriaController');

Route::resource('clientes', 'ClienteController');
Route::resource('ventas', 'VentaController');

Route::get("/vender", "VenderController@index")->name("vender.index");
Route::post("/productoDeVenta", "VenderController@agregarProductoVenta")->name("agregarProductoVenta");
Route::Delete("/productoDeVenta", "VenderController@quitarProductoDeVenta")->name("quitarProductoDeVenta");
Route::post("/terminarOCancelarVenta", "VenderController@terminarOCancelarVenta")->name("terminarOCancelarVenta");
