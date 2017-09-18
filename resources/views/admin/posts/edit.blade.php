@extends('layouts.admin')
@section('title', 'Admin - Edit Post')

@section('content')

    <h1>Edit Post</h1>

    <div class="col-sm-3">
        <img src="{{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">


		{!! Form::model($post, ['action' => ['AdminPostsController@update', $post->id], 'method' => 'patch', 'files' => true]) !!}

		  <div class="form-group">

		    {!! Form::label('title', 'Title') !!}

		    {!! Form::text('title', null, ['class' => 'form-control']) !!}

		  </div>  

		  <div class="form-group">

		    {!! Form::label('category_id', 'Category') !!}

		    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

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

		  {!! Form::submit('Save Post', ['class' => 'btn btn-primary col-sm-6']) !!}

		  </div>

	  	{!! Form::close() !!}

		{!! Form::open((['action' => ['AdminPostsController@destroy', $post->id], 'method' => 'delete'])) !!}

			<div class="form-group">

				{!! Form::submit('Delete Post', ['class' => 'btn btn-danger col-sm-6']) !!}

			</div>

	  	{!! Form::close() !!}	

        @include('partials.form_errors')

    </div>
    

@endsection
