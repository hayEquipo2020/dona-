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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// usuarios
Route::get('/usuarios/perfil/{id}', 'UserController@perfil')->name('perfil');

// articuloes
Route::get('/articulos', 'ArticuloController@articulos')->name('articulo');
Route::get('/articulos', 'ArticuloController@articulos')->name('articulo');
Route::get('/articulo/nuevo', 'ArticuloController@nuevo')->name('nuevoarticulo');
Route::get('/articulo/{id}', 'ArticuloController@detalle')->name('articulodetalle');
