<?php

class StoresController extends BaseController {

	//csrf
	public function __construct(){
		parent::__construct();

		$this->beforeFilter('csrf', ['on'=>'post']);
		
	}


	public function index()
	{
		return View::make('stores.index')->withProducts(Product::take(4)->orderBy('created_at', 'DESC')->get());
	}

	public function show($id)
	{
		return View::make('stores.show')->withProduct(Product::find($id));
	}

	public function getCategory($cat_id){
		return View::make('stores.category')
			->with('products', Product::where('category_id', $cat_id)->paginate(6))
			->with('category', Category::find($cat_id));
	}

	public function getSearch(){
		$keyword = Input::get('keyword');

		return View::make('stores.search')
			->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->get())
			->with('keyword', $keyword);
	}	

	public function getContact(){
		
		return View::make('stores.contact');
	}
	
}