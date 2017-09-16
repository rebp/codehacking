@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>

    <div class="col-sm-3">
        <img src="{{ $user->photo ? $user->photo->file : 'http://via.placeholder.com/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">

		{!! Form::model($user, ['action' => ['AdminUsersController@update', $user->id], 'method' => 'patch', 'files' => true]) !!}

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

            {!! Form::label('photo_id', 'Photo') !!}

		    {!! Form::file('photo_id', ['class' => 'form-control']) !!}

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

    </div>

@endsection