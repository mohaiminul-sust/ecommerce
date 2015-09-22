<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// home
Route::get('/', ['as'=>'kopaya','uses'=>'StoresController@index']);

//admin routes

Route::group(['prefix'=>'admin'], function(){
	
	Route::group(['prefix'=>'categories'], function(){

		Route::get('/', ['as'=>'admin.categories', 'uses'=>'CategoriesController@index']);
		Route::post('/', ['as'=>'admin.categories.store', 'uses'=>'CategoriesController@store']);
		Route::delete('/{id}', ['as'=>'admin.categories.destroy', 'uses'=>'CategoriesController@destroy']);

	});

	Route::group(['prefix'=>'products'], function(){

		Route::get('/', ['as'=>'admin.products', 'uses'=>'ProductsController@index']);
		Route::post('/', ['as'=>'admin.products.store', 'uses'=>'ProductsController@store']);
		Route::delete('/{id}', ['as'=>'admin.products.destroy', 'uses'=>'ProductsController@destroy']);
		Route::put('/{id}', ['as'=>'admin.products.update', 'uses'=>'ProductsController@update']);

	});

});


//Stores Routes

Route::group(['prefix'=>'stores'], function(){
	Route::get('/search', ['as'=>'stores.search', 'uses'=>'StoresController@getSearch']);
	Route::get('/category/{cat_id}', ['as'=>'stores.category', 'uses'=>'StoresController@getCategory']);
	Route::get('/{id}', ['as'=>'stores.show', 'uses'=>'StoresController@show']);
	Route::get('/', ['as'=>'stores', 'uses'=>'StoresController@index']);
});


