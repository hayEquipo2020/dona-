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
/*
Route::get('/', function () {
    return view('welcome');
});
*/ 
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// usuarios
Route::get('/usuarios/perfil/{id}', 'UserController@perfil')->name('perfil');
Route::get('/usuarios/editar/{id}', 'UserController@editar')->name('editar');
Route::post('/usuarios/update', 'UserController@update')->name('updateusuario');

// articuloes
Route::get('/articulos', 'ArticuloController@index')->name('articulo');
Route::get('/articulo/nuevo', 'ArticuloController@nuevo')->name('nuevoarticulo');
Route::post('/articulos/publicar', 'ArticuloController@publicar')->name('publicararticulo');
Route::post('/articulos/update', 'ArticuloController@update')->name('updatearticulo');
Route::post('/articulo/ofertar', 'ArticuloController@ofertar')->name('ofertar');
Route::get('/articulo/editar/{id}', 'ArticuloController@editar')->name('articuloeditar');
Route::get('/articulo/{id}', 'ArticuloController@detalle')->name('articulodetalle');
