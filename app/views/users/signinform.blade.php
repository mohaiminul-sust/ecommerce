@extends('layouts.main')

@section('content')

	<section id="signin-form">
        
        <h1>I have an account</h1>

        {{ Form::open(['route' => 'users.signin', 'method' => 'post']) }}
            <p>
                {{ HTML::image('img/email.gif', 'E-mail Address') }}
                {{ Form::text('email', null, ['placeholder' => 'Enter user e-mail address']) }}
            </p>
            <p>
                {{ HTML::image('img/password.gif', 'Password') }}
                {{ Form::password('password', ['placeholder' => '**********']) }}
            </p>
			{{-- Used 'Form::button' instead of 'Form::submit' to fulfill styling requirements  --}}
        	{{-- {{ Form::submit('SIGN IN', ['class' => 'secondary-cart-btn']) }} --}}
        	{{ Form::button('SIGN IN', ['type' => 'submit' ,'class' => 'secondary-cart-btn']) }}
        {{ Form::close() }}

    </section><!-- end signin-form -->
    <section id="signup">
        <h2>I'm a new customer</h2>
        <h3>You can create an account in just a few simple steps.<br>
            Click below to begin.</h3>
            
        <a href="{{ URL::route('users.createform') }}" class="default-btn">CREATE NEW ACCOUNT</a>
    </section><!--- end signup -->
	

@stop