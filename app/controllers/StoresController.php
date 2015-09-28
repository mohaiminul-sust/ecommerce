<?php

class StoresController extends BaseController {

	//csrf
	public function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', ['on'=>'post']);
		$this->beforeFilter('auth', ['only'=>['addToCart', 'getCart', 'removeCartItem']]);
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
	
	//cart functions below

	public function addToCart(){

		$product = Product::find(Input::get('id'));
		$quantity = Input::get('quantity');
		$user_id = Auth::user()->id;

		Cart::insert([
			'id' => $product->id,
			'name' => $product->title,
			'price' => $product->price,
			'quantity' => $quantity,
			'user_id' => $user_id,
			'image' => $product->image
		]);

		return Redirect::to('stores/cart')->withMessage('Inserted product into cart : '.$product->title.' Quantity: '.$quantity);
	}

	public function getCart(){
		
		return View::make('stores.cart')
			->with('user_id', Auth::user()->id)
			->withProducts(Cart::contents());
	}

	public function removeCartItem($identifier){
		
		$item = Cart::item($identifier);
		$item->remove();
		
		return Redirect::to('stores/cart')->withMessage('Removed product from cart : '.$item->name);

	}

	
}