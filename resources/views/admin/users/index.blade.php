@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{ session('deleted_user') }}</p>
    @endif

    @if(Session::has('updated_user'))
        <p class="bg-success">{{ session('updated_user') }}</p>
    @endif

    @if(Session::has('created_user'))
        <p class="bg-success">{{ session('created_user') }}</p>
    @endif

    <h1> Users </h1>


    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>

    @if($users)
        @foreach($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <td>
                    @if($user->photo)
                        <img height=100 src="{{ $user->photo->file }}" alt="{{ $user->name }}" class="img-rounded">
                    @else
                        <img src="http://via.placeholder.com/100x100'" alt="" class="img-rounded">
                    @endif
                </td>
                <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    @endif

    </tbody>
    </table>
    

@endsection
