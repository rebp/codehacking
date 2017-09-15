@extends('layouts.admin')

@section('content')

    <h1>Create User</h1>

		{!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'post', 'files' => true]) !!}

		  <div class="form-group">

		    {!! Form::label('name', 'Name') !!}

		    {!! Form::text('name', null, ['class' => 'form-control']) !!}

		  </div>
		  
		  <div class="form-group">

		    {!! Form::label('email', 'Email') !!}

		    {!! Form::text('email', null, ['class' => 'form-control']) !!}	

		  </div>

            <div class="form-group">

                {!! Form::label('role_id', 'Role') !!}

                {!! Form::select('role_id', ['' => 'Choose Options'] + $roles, null, ['class' => 'form-control']) !!}                 


            </div>

            <div class="form-group">

                {!! Form::label('is_active', 'Status') !!}

                {!! Form::select('is_active', [
                    0 => 'Not Active',
                    1 => 'Active'
                ], null, ['class' => 'form-control']) !!}                 


            </div>

		  <div class="form-group">

            {!! Form::label('file', 'Profiel Image') !!}

		    {!! Form::file('file', ['class' => 'form-control']) !!}

		  </div>

            <div class="form-group">

                {!! Form::label('password', 'Password') !!}

                {!! Form::password('password', ['class' => 'form-control']) !!}                 


            </div>

		  <div class="form-group">

		  {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}

		  </div>

	  	{!! Form::close() !!}

        @include('partials.form_errors')

@endsection