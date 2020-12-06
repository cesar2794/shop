<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/products', 'ProductController@index'); // Listado
    Route::get('/products/create', 'ProductController@create'); // Ver el Formulario
    Route::post('/products', 'ProductController@store'); // Registrar datos del Formulario

    Route::get('/products/{id}/edit', 'ProductController@edit'); // Formulario Edición
    Route::post('/products/{id}/edit', 'ProductController@update'); // Actualizar

    Route::delete('/products/{id}', 'ProductController@destroy'); // Formulario Eliminar


    Route::get('/products/{id}/images', 'ImageController@index'); //Listado de imágenes según el producto seleccionado
    Route::post('/products/{id}/images', 'ImageController@store'); //Para gestionar las nuevas imágenes
    Route::delete('/products/{id}/images', 'ImageController@destroy'); // Formulario para eliminar una imagen determinada
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); //Destacar una imagen
});