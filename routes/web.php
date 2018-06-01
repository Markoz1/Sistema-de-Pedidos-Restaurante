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

Route::get('/', 'HomeController@index')->name('inicio');
Route::resource('productos', 'ProductoController');
//Route::view('menu', 'menu.index');


Route::resource('categorias', 'CategoriasController');

//Route::get('categorias/','CategoriasController@index')			->name('categorias.index');

//Route::get('/categorias/nuevo','CategoriasController@create')			->name('categorias.new');

//Route::post('/categorias/crear','CategoriasController@store');

Route::get('menu', 'HomeController@menu')->name('menu');
Route::resource('pedidos', 'PedidoController');

Route::get('/users', 'UserController@index');
// Auth::routes();
Route::get('login', 'LoginController@ShowLoginForm');
Route::post('login','LoginController@login')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');
Route::view('mesas', 'mesas.index');
