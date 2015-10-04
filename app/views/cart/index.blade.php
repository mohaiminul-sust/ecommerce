@extends('layouts.main')

@section('content')
<div id="shopping-cart">
    <h1>Shopping Cart & Checkout</h1>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <table border="1">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            @foreach($products as $product)
            	{{-- {{ dd($product); }} --}}
	            <tr>
	                <td>{{ $product->id }}</td>
	                <td>
	                    {{-- <img src="img/main-product.png" alt="Product" width="65" height="37" />  --}}
	                    {{ HTML::image($product->options->has('image') ? $product->options->image : '', $product->name, ['width'=>'65', 'height'=>'37']) }}
	                    {{ $product->name }}
	                </td>
	                <td>{{ $product->price }}</td>
	                <td>
	                    {{ $product->qty }}
	                </td>
	                <td>
	                    {{ $product->price * $product->qty }}
	                    <a href="{{ URL::route('cart.removeitem', $product->rowid) }}">
	                        {{ HTML::image('img/remove.gif', 'Remove product') }}
	                    </a>
	                </td>
	            </tr>
            @endforeach

            <tr class="total">
                <td colspan="5">
                    
                    <span>TOTAL: ${{ Cart::instance($instance)->total() }}</span><br />
					
					{{-- required fields for paypal --}}

					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="bussiness" value="office@shop.com"> {{-- change this value with shops paypal id --}}
					<input type="hidden" name="item_name" value="eCommerce Store Purchase">
					<input type="hidden" name="amount" value="{{ Cart::instance($instance)->total() }}">
					<input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
					<input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
					<input type="hidden" name="email" value="{{ Auth::user()->email }}">

					{{-- end required fields for paypal --}}
					<?php 
						$selfLink = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
						$prevLink = URL::previous();
					?>
                    <a href="{{ CartUtil::linkMatch( $selfLink , $prevLink ) }}" class="tertiary-btn">CONTINUE SHOPPING</a>
                    <a href="{{ URL::route('cart.destroy') }}" class="alert-btn">EMPTY CART</a>
                    <input type="submit" value="CHECKOUT WITH PAYPAL" class="secondary-cart-btn">
                </td>
            </tr>
        </table>
        {{ 'Self : '.'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}
        {{ 'URL prev : '.URL::previous()}}
        {{ CartUtil::linkMatch( $selfLink , $prevLink ) }}
    </form>
</div><!-- end shopping-cart -->
@stop