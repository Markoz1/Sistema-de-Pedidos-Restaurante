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
Route::resource('categorias', 'CategoriasController');
Route::get('menu', 'HomeController@menu')->name('menu');
Route::resource('pedidos', 'PedidoController');
// Auth::routes();
Route::get('login', 'LoginController@ShowLoginForm');
Route::post('login','LoginController@login')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');
Route::resource('mesas', 'MesasController');
Route::resource('clientes', 'clienteController');
Route::resource('cuentas','CuentaController');
Route::get('cuentas/{cuenta}/factura/','CuentaController@pdf')
		->name('cuentas.facturaPDF');
//Route::get('cuentas/pdf/{cuenta}/factura',)
Route::get('/pedidos/{pedido}','PedidoController@existePedido')
		->name('pedidos.existe');
Route::resource('users', 'UserController');
// Route::post('users/{id}', 'UserController@update');

