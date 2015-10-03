@extends('layouts.main')



@section('promo')

<section id="promo-alt">
   
    @for($i = 1; $i <=3 ; $i++)
        <?php 
            $promo_id = 'promo'.$i; 
            $product = Promo::getRandProduct(Product::all());
        ?>

        @if($product)
            @if($promo_id == 'promo1')
                
                <div id="{{ $promo_id }}">
                    <h1>{{ $product->title }}</h1>

                    <p>{{ Promo::getDescription($product->description) }}</p>

                    <a href="{{ URL::route('stores.show', $product->id) }}" class="secondary-btn">READ MORE</a>
                    {{-- {{ HTML::image($product->image, $product->title, ['width'=>'709', 'height'=>'401']) }} --}}
                    {{ HTML::image('img/macbook.png', 'Macbook Pro') }}

                </div><!-- end promo1 -->

            @elseif($promo_id == 'promo2')
                
                <div id="{{ $promo_id }}">
                    
                    <h2>{{ $product->title }}</h2>

                    <p>{{ Promo::getDescription($product->description) }}</p>

                    <a href="{{ URL::route('stores.show', $product->id) }}">
                        Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}
                    </a>

                    {{ HTML::image('img/iphone.png', 'iPhone') }}
                    {{-- {{ HTML::image($product->image, $product->title, ['width'=>'66', 'height'=>'130']) }} --}}
                </div><!-- end promo2 -->
            
            @elseif($promo_id == 'promo3')

                <div id="{{ $promo_id }}">
                    {{ HTML::image('img/thunderbolt.png', 'Thunderbolt') }}
                    {{-- {{ HTML::image($product->image, $product->title, ['width'=>'66', 'height'=>'130']) }} --}}
                    
                    <h2>{{ $product->title }}</h2>

                    <p>{{ Promo::getDescription($product->description) }}</p>
                    

                    <a href="{{ URL::route('stores.show', $product->id) }}">
                        Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}
                    </a>
                </div><!-- end promo3 --> --}}
            
            @endif
        
        @endif
    
    @endfor
</section><!-- promo-alt -->

@stop


@section('content')

<h2>{{ $category->name }}</h2>
<hr>

<aside id="categories-menu">
    <h3>CATEGORIES</h3>
    <ul>
        @foreach($catnav as $cat)
            <li>{{ HTML::link('stores/category/'.$cat->id, $cat->name) }}</li>
        @endforeach
    </ul>
</aside><!-- end categories-menu -->

<div id="listings">

@foreach($products as $product)

<div class="product">
    <a href="{{ URL::route('stores.show', $product->id) }}">
    	{{ HTML::image($product->image, $product->title, ['class'=>'feature', 'width'=>'240', 'height'=>'127']) }}
    </a>

    <h3><a href="{{ URL::route('stores.show', $product->id) }}">{{ $product->title }}</a></h3>

    <p>{{ $product->description }}</p>

    <h5>Availability: 
    	<span class="{{ Availability::displayClass($product->availability) }}">
    		{{ Availability::display($product->availability) }}
   		</span>
    </h5>

    <p>
    
        {{ Form::open(['route'=>'cart.additem', 'method'=>'post']) }}
        {{ Form::hidden('quantity', 1) }}
        {{ Form::hidden('id', $product->id) }}
        <button type="submit" class="cart-btn">
            <span class="price">{{ $product->price }}</span>
            {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
            ADD TO CART
        </button>
        {{ Form::close() }}
    </p>
</div>
@endforeach

</div>{{-- end listings --}}

@stop


@section('pagination')

 <section id="pagination">
 	{{ $products->links() }}
 </section>{{-- end pagination --}}

@stop