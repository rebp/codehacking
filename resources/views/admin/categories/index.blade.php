@extends('layouts.admin')

@section('content')


    <h1> Categories </h1>

    <div class="col-sm-6">

		{!! Form::open(['action' => 'AdminCategoriesController@store', 'method' => 'post']) !!}

		  <div class="form-group">

		    {!! Form::label('name', 'Category') !!}

		    {!! Form::text('name', null, ['class' => 'form-control']) !!}

		  </div>  


		  <div class="form-group">

		  {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}

		  </div>

	  	{!! Form::close() !!}

        @include('partials.form_errors')

    </div>

    <div class="col-sm-6">

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>   
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>

            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    
    </div>
    

@endsection
