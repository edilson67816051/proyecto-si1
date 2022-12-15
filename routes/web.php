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

Route::resource('proveedor', 'ProveedorController');

Route::resource('bitacora', 'BitacoraController');

Route::resource('compras', 'CompraController');

Route::get("/comprar", "ComprarController@index")->name("comprar.index");
Route::post("/productoDeCompra", "ComprarController@agregarProductoCompra")->name("agregarProductoCompra");
Route::Delete("/productoDecompra", "ComprarController@quitarProductoDeCompra")->name("quitarProductoDeCompra");
Route::post("/terminarOCancelarCompra", "ComprarController@terminarOCancelarCompra")->name("terminarOCancelarCompra");
