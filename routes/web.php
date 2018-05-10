<?php

Route::get('/','TestController@welcome');

Route::get('/prueba',function(){
	return 'Hola soy la ruta prueba';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');
Route::post('/cart','CartDetailController@store');//formulario 
Route::delete('/cart','CartDetailController@destroy');//eliminacion

Route::post('/order','CartController@update');//formulario 

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
   
Route::get('/products', 'ProductController@index');//listado
Route::get('/products/create','ProductController@create');//formulario registro
Route::post('/products/', 'ProductController@store');//registrar
Route::get('/products/{id}/edit','ProductController@edit');//formulario edición
Route::post('/products/{id}/edit', 'ProductController@update');//registrar
Route::post('/products/{id}/delete','ProductController@destroy');//formulario eliminacion

Route::get('/products/{id}/images','ImageController@index');//formulario edición
Route::post('/products/{id}/images', 'ImageController@store');//registrar
Route::delete('/products/{id}/images', 'ImageController@destroy');//eliminar
Route::get('/products/{id}/images/select/{image}','ImageController@select');//formulario edición

});

// Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
   
// Route::get('/products', 'ProductController@index');//listado
// Route::get('/products/create','ProductController@create');//formulario registro
// Route::post('/products/', 'ProductController@store');//registrar
// Route::get('/products/{id}/edit','ProductController@edit');//formulario edición
// Route::post('/products/{id}/edit', 'ProductController@update');//registrar
// Route::post('/products/{id}/delete','ProductController@destroy');//formulario eliminacion

// Route::get('/products/{id}/images','ImageController@index');//formulario edición
// Route::post('/products/{id}/images', 'ImageController@store');//registrar
// Route::delete('/products/{id}/images', 'ImageController@destroy');//eliminar
// Route::get('/products/{id}/images/select/{image}','ImageController@select');//formulario edición

// });
