@extends('layouts.main')

@section('content')

<div id="admin">
	<h1>Categories Admin Panel</h1><hr>

	<p>Hi, {{ Auth::user()->firstname }} !</br> Here you can view, delete, and create new categories.</p>

	<h2>Categories</h2><hr>

	<ul>
		@foreach($categories as $category)
			<li>
				{{ $category->name }} -
				{{ Form::open(['route'=>['admin.categories.destroy', $category->id],'method'=>'delete', 'class'=>'form-inline']) }}
				{{ Form::submit('delete') }}
				{{ Form::close() }}
			</li>
		@endforeach
	</ul>

	<h2>Create new Category</h2><hr>

	@if($errors->has())
		<div id="form-errors">
			<p>The follwing errors have occured:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>{{-- end form errors --}}
	@endif

	{{ Form::open(['route'=>'admin.categories.store']) }}
	<p>
		{{ Form::label('name') }}
		{{ Form::text('name') }}
	</p>
	{{ Form::submit('Create Category', ['class'=>'secondary-cart-btn']) }}
	{{ Form::close() }}
</div>{{-- end admin --}}



@stop