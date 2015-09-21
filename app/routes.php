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

Route::get('/', ['uses'=>'StoresController@index']);

Route::resource('admin/categories', 'CategoriesController');

Route::resource('admin/products', 'ProductsController');


Route::get('stores/category/{cat_id}', 'StoresController@getCategory');

Route::get('stores/search', 'StoresController@getSearch');

Route::resource('stores', 'StoresController');

