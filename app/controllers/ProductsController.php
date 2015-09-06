<?php

class ProductsController extends \BaseController {
	public function __construct(){
		$this->beforeFilter('csrf', ['on'=>'post']);
	}
	/**
	 * Display a listing of the resource.
	 * GET /products
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = [];
		foreach (Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}
		return View::make('products.index')->withProducts(Product::all())->withCategories($categories);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /products/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /products
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Product::$rules);

		if($validator->passes()){
			$product = new Product;

			$product->category_id = Input::get('category_id'); 
			$product->title= Input::get('title');
			$product->description = Input::get('description');
			$product->price = Input::get('price');

			$image = Input::file('image');
			$filename = date('Y-m-d-H-i-s')."-".$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(468, 249)->save('public/img/products/'.$filename);
			$product->image = 'img/products/'.$filename;
			$product->save();

			return Redirect::to('admin/products')->with('message', 'Product Created!');
		}
		
		return Redirect::to('admin/products')->with('message', 'Something went wrong!!!')
													->withErrors($validator)->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /products/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::find($id);

		if($product){
			$product->availability = Input::get('availability');
			$product->save();
			return Redirect::to('admin/products')->with('message', 'Product updated');
		}

		return Redirect::to('admin/products')->with('message', 'Invalid Product!!');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::find($id);

		if($product){
			File::delete('public/'.$product->image);
			$product->delete();
			return Redirect::to('admin/products')->with('message', 'Product Deleted!');
		}

		return Redirect::to('admin/products')->with('message', 'Something went wrong!!');
	}

	//The following piece of code has been transfered to update method

	// public function toggleAvailability(){
	// 	$product = Product::find(Input::get('id'));

	// 	if($product){
	// 		$product->availability = Input::get('availability');
	// 		$product->save();
	// 		return Redirect::to('admin/products')->with('message', 'Product updated');
	// 	}

	// 	return Redirect::to('admin/products')->with('message', 'Invalid Product!!');
	// }



}