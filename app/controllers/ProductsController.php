<?php

class ProductsController extends BaseController {
	public function __construct(){
		parent::__construct();

		$this->beforeFilter('csrf', ['on'=>'post']);
		$this->beforeFilter('admin');
	}
	

	public function index()
	{
		$categories = [];

		foreach (Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}

		return View::make('products.index')
			->withProducts(Product::all())
			->withCategories($categories);
	}

	
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

			return Redirect::to('admin/products')->withMessage('Product Created!');
		}
		
		return Redirect::to('admin/products')
			->withMessage('Something went wrong!!!')
			->withErrors($validator)->withInput();
	}

	
	public function update($id)
	{
		$product = Product::find($id);

		if($product){
			$product->availability = Input::get('availability');
			$product->save();
			return Redirect::to('admin/products')->withMessage('Product updated');
		}

		return Redirect::to('admin/products')->withMessage('Product update failed !!');
	}

	
	public function destroy($id)
	{
		$product = Product::find($id);

		if($product){
			File::delete('public/'.$product->image);
			$product->delete();
			return Redirect::to('admin/products')->withMessage('Product Deleted !');
		}

		return Redirect::to('admin/products')->withMessage('Product deletion failed !!');
	}

}