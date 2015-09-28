<?php

class StoresController extends BaseController {

	//csrf
	public function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', ['on'=>'post']);
		$this->beforeFilter('auth', ['only'=>['addToCart', 'getCart', 'removeCartItem', 'destroyCart']]);
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
		// $user_id = Auth::user()->id;
		$instance = Auth::user()->firstname.'_'.Auth::user()->id.'_shopping';


		Cart::instance($instance)->add([
			'id' => $product->id,
			'name' => $product->title,
			'qty' => $quantity,
			'price' => $product->price,
			'options' => ['image' => $product->image]
		]);
		// dd(Cart::content());
		return Redirect::to('stores/cart')->withMessage('Inserted product into cart : '.$product->title.' Quantity: '.$quantity);
	}

	public function getCart(){
		
		$instance = Auth::user()->firstname.'_'.Auth::user()->id.'_shopping';
		
		return View::make('stores.cart')
			->with('instance', $instance)
			->withProducts(Cart::instance($instance)->content());
	}

	public function removeCartItem($rowid){
		$instance = Auth::user()->firstname.'_'.Auth::user()->id.'_shopping';
		
		// $item = Cart::item($identifier);
		// $item->remove();
		Cart::instance($instance)->remove($rowid);
		return Redirect::to('stores/cart')->withMessage('Removed product from cart');

	}

	public function destroyCart(){
		$instance = Auth::user()->firstname.'_'.Auth::user()->id.'_shopping';


		Cart::instance($instance)->destroy();
		return Redirect::to('stores/cart')->withMessage('Cart destroyed!!!!');

	}

	
}