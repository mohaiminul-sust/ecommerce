@extends('layouts.main')

@section('search-keyword')

<hr>
<section id="search-keyword">
    <h1>Search Results for <span>{{ $keyword }}</span></h1>
</section><!-- end search-keyword -->

@stop


@section('content')

<div id="search-results">
	@foreach($products as $product)

	<div class="product">
	    <a href="stores/{{ $product->id }}">
	    	{{ HTML::image($product->image, $product->title, ['class'=>'feature', 'width'=>'240', 'height'=>'127']) }}
	    </a>

	    <h3><a href="stores/{{ $product->id }}">{{ $product->title }}</a></h3>

	    <p>{{ $product->description }}</p>

	    <h5>Availability: 
	    	<span class="{{ Availability::displayClass($product->availability) }}">
	    		{{ Availability::display($product->availability) }}
	   		</span>
	    </h5>

	    <p>
	        <a href="#" class="cart-btn">
	            <span class="price">${{ $product->price }}</span>
	             {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
	              ADD TO CART
	        </a>
	    </p>
	</div>
	@endforeach
</div><!-- end search-results -->

@stop
