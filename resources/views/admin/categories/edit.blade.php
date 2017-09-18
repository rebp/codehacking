@extends('layouts.admin')

@section('content')


    <h1>Edit Category</h1>

    <div class="col-sm-6">

		{!! Form::model($category, ['action' => ['AdminCategoriesController@update', $category->id], 'method' => 'patch']) !!}

		  <div class="form-group">

		    {!! Form::label('name', 'Category') !!}

		    {!! Form::text('name', null, ['class' => 'form-control']) !!}

		  </div>  


		  <div class="form-group">

		  {!! Form::submit('Update Category', ['class' => 'btn btn-primary  col-sm-6']) !!}

		  </div>

	  	{!! Form::close() !!}

		{!! Form::open((['action' => ['AdminCategoriesController@destroy', $category->id], 'method' => 'delete'])) !!}

			<div class="form-group">

				{!! Form::submit('Delete Category', ['class' => 'btn btn-danger col-sm-6']) !!}

			</div>

	  	{!! Form::close() !!}	

        @include('partials.form_errors')

    </div>
    

@endsection
