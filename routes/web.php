<?php

use App\Http\Controllers\TestController;

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products', 'ProductController@index'); // Listado
Route::get('/admin/products/create', 'ProductController@create'); // Ver el Formulario
Route::post('/admin/products', 'ProductController@store'); // Registrar datos del Formulario

Route::get('/admin/products/{id}/edit', 'ProductController@edit'); // Formulario Edición
Route::post('/admin/products/{id}/edit', 'ProductController@update'); // Actualizar

Route::delete('/admin/products/{id}', 'ProductController@destroy'); // Formulario Eliminar