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
Route::get('/', ['as'=>'homeroute','uses'=>'StoresController@index']);


//Stores Routes

Route::group(['prefix'=>'stores'], function(){

	Route::get('/cart', ['as'=>'stores.cart', 'uses'=>'StoresController@getCart']);
	Route::post('/cart', ['as'=>'stores.addtocart', 'uses'=>'StoresController@addToCart']);
	Route::get('/cart/removeitem/{identifier}', ['as'=>'stores.removecartitem', 'uses'=>'StoresController@removeCartItem']);

	Route::get('/contact', ['as'=>'stores.contact', 'uses'=>'StoresController@getContact']);
	Route::get('/category/{cat_id}', ['as'=>'stores.category', 'uses'=>'StoresController@getCategory']);
	Route::get('/search', ['as'=>'stores.search', 'uses'=>'StoresController@getSearch']);
	Route::get('/{id}', ['as'=>'stores.show', 'uses'=>'StoresController@show']);
	Route::get('/', ['as'=>'stores', 'uses'=>'StoresController@index']);
	
});

//Users Routes

Route::group(['prefix'=>'users'], function(){

	Route::get('/create', ['as'=>'users.createform', 'uses'=>'UsersController@createForm']);
	Route::post('/create', ['as'=>'users.create', 'uses'=>'UsersController@createAccount']);
	Route::get('/signin', ['as'=>'users.signinform', 'uses'=>'UsersController@signinForm']);
	Route::post('/signin', ['as'=>'users.signin', 'uses'=>'UsersController@signinAccount']);
	Route::get('/signout', ['as'=>'users.signout', 'uses'=>'UsersController@signoutAccount']);
});


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




