@extends('layouts.admin')
@section('title', 'Admin - Create Post')

@section('content')

		@include('partials.tinyeditor')

    <h1>Create Post</h1>

		{!! Form::open(['action' => 'AdminPostsController@store', 'method' => 'post', 'files' => true]) !!}

		  <div class="form-group">

		    {!! Form::label('title', 'Title') !!}

		    {!! Form::text('title', null, ['class' => 'form-control']) !!}

		  </div>  

		  <div class="form-group">

		    {!! Form::label('category_id', 'Category') !!}

		    {!! Form::select('category_id', ['' => 'Choose Category'] + $categories, null, ['class' => 'form-control']) !!}

		  </div> 

		  <div class="form-group">

            {!! Form::label('photo_id', 'Image') !!}

		    {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}

		  </div>

		  <div class="form-group">

            {!! Form::label('body', 'Body') !!}

		    {!! Form::textarea('body', null,  ['class' => 'form-control']) !!}

		  </div>


		  <div class="form-group">

		  {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}

		  </div>

	  	{!! Form::close() !!}

        @include('partials.form_errors')
    

@endsection
