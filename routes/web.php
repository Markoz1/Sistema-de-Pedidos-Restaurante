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

Route::view('/', 'home');
Route::resource('productos', 'ProductoController');

Route::resource('categorias', 'CategoriasController');


Route::get('modal-menu', 'MenuController@getModalMenu');
			// ->name('menu.modal');
Route::resource('menu', 'MenuController');
Route::resource('pedidos', 'PedidoController');
Route::resource('vistaCocina','CocinaController');
