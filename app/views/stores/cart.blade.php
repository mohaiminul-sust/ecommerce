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
            	@if($product->user_id == $user_id)
	            <tr>
	                <td>{{ $product->id }}</td>
	                <td>
	                    {{-- <img src="img/main-product.png" alt="Product" width="65" height="37" />  --}}
	                    {{ HTML::image($product->image, $product->name, ['width'=>'65', 'height'=>'37']) }}
	                    {{ $product->name }}
	                </td>
	                <td>{{ $product->price }}</td>
	                <td>
	                    {{ $product->quantity }}
	                </td>
	                <td>
	                    {{ $product->price * $product->quantity }}
	                    <a href="{{ URL::route('stores.removecartitem', $product->identifier) }}">
	                        {{ HTML::image('img/remove.gif', 'Remove product') }}
	                    </a>
	                </td>
	            </tr>
	            {{-- @elseif() --}}
	            @endif
            @endforeach

            <tr class="total">
                <td colspan="5">
                    Subtotal: ${{ CartHelper::displaySubtotal($user_id, $products) }}<br />
                    <span>TOTAL: ${{ CartHelper::displaySubtotal($user_id, $products) }}</span><br />
					
					{{-- required fields for paypal --}}

					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="bussiness" value="office@shop.com"> {{-- change this value with shops paypal id --}}
					<input type="hidden" name="item_name" value="eCommerce Store Purchase">
					<input type="hidden" name="amount" value="{{ Cart::total() }}">
					<input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
					<input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
					<input type="hidden" name="email" value="{{ Auth::user()->email }}">

					{{-- end required fields for paypal --}}

                    <a href="/" class="tertiary-btn">CONTINUE SHOPPING</a>
                    <input type="submit" value="CHECKOUT WITH PAYPAL" class="secondary-cart-btn">
                </td>
            </tr>
        </table>
    </form>
</div><!-- end shopping-cart -->
@stop