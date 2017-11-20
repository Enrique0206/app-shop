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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//middleware
Route::middleware(['auth', 'admin'])->group(function(){
		//para ver la lista se hara peticion get
		Route::get('/admin/products', 'ProductController@index'); //esta ruta mostrara el listado de productos. El controlador que nos permitira gestionar la informacion de los productos sera ProductController, el metodo index sera el encargado de devolver el listado de productos 
		//para crear un producto haremos la peticiuon get para que nos traiga el formulario para agregar el producto
		Route::get('/admin/products/create', 'ProductController@create'); //esta ruta permitira registrar nuevos productos' El controlador usar el metodo create
		//para guardar (registrar) haremos una peticion post a la ruta admi/products
		Route::post('/admin/products', 'ProductController@store'); //para guardar los datos usaremos el metodo sotr en el ProductController
		Route::get('/admin/products/{id}/edit', 'ProductController@edit');//para editar
		Route::post('/admin/products/{id}/edit', 'ProductController@update');//actualizar
		//Route::get('/admin/products/{id}/delete', 'ProductController@destroy');//1era forma de eliminar con get
		Route::post('/admin/products/{id}/delete', 'ProductController@destroy'); //recomendable este 2do metodo con post

		/* terminando todo esto crearemos el controlador ProductoController
		con el comando: php artisan make:controller ProductController*/
	
		Route::get('/admin/products/{id}/images', 'ImageController@index'); //ruta del listado de imagenes
		Route::post('/admin/products/{id}/images', 'ImageController@store');
		Route::post('/admin/products/{id}/images', 'ImageController@destroy');		
});

