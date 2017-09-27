@extends('layouts.admin')
@section('title', 'Admin - Posts')

@section('content')

    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{ session('deleted_post') }}</p>
    @endif

    @if(Session::has('updated_post'))
        <p class="bg-success">{{ session('updated_post') }}</p>
    @endif

    @if(Session::has('created_post'))
        <p class="bg-success">{{ session('created_post') }}</p>
    @endif

    <h1>Posts</h1>

    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>            
            <th>Title</th>
            <th>Content</th>
            <th></th>
            <th></th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>

    @if($posts)
        @foreach($posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td><img height="100" src="{{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/100x100'}}" class="img-rounded" alt=""></td>
                <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->user->name }}</a></td>
                <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td><a href="{{ route('home.post', $post->slug) }}">View Post</a></td>
                <td><a href="{{ route('admin.comments.show', $post->id) }}">View Comment</a></td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    @endif

    </tbody>
    </table>
    

@endsection
