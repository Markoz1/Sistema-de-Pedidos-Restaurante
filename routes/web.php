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
//Route::view('menu', 'menu.index');


Route::resource('categorias', 'CategoriasController');

//Route::get('categorias/','CategoriasController@index')			->name('categorias.index');

//Route::get('/categorias/nuevo','CategoriasController@create')			->name('categorias.new');

//Route::post('/categorias/crear','CategoriasController@store');

Route::get('modal-menu', 'MenuController@getModalMenu');
			// ->name('menu.modal');
Route::resource('menu', 'MenuController');
Route::resource('pedidos', 'PedidoController');
