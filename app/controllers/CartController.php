<?php

class CartController extends BaseController {

	
	public function __construct(){
		parent::__construct();

		$this->beforeFilter('csrf', ['on'=>'post']);
		$this->beforeFilter('auth');
	}

	
	public function index(){
		
		$instance = Auth::user()->firstname.'_'.Auth::user()->id.'_shopping';
		
		return View::make('cart.index')
			->with('instance', $instance)
			->withProducts(Cart::instance($instance)->content());
	}

	public function addItem(){

		$product = Product::find(Input::get('id'));
		$quantity = Input::get('quantity');
		$instance = Auth::user()->firstname.'_'.Auth::user()->id.'_shopping';

		if($product->availability == 1){
			Cart::instance($instance)->add([
				'id' => $product->id,
				'name' => $product->title,
				'qty' => $quantity,
				'price' => $product->price,
				'options' => ['image' => $product->image]
			]);
			// dd(Cart::content());
			return Redirect::to('/cart')->withMessage('Inserted product into cart : '.$product->title.' Quantity: '.$quantity);
		}
		
		return Redirect::back()->withMessage('Can\'t add product to cart ! Product NOT available !');		 
	}

	public function removeItem($rowid){
		$instance = Auth::user()->firstname.'_'.Auth::user()->id.'_shopping';
		
		Cart::instance($instance)->remove($rowid);
		return Redirect::to('/cart')->withMessage('Removed product from cart');

	}

	public function destroy(){
		$instance = Auth::user()->firstname.'_'.Auth::user()->id.'_shopping';

		Cart::instance($instance)->destroy();
		return Redirect::to('/cart')->withMessage('Cart Emptied !');

	}

	
}