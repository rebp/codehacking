@extends('layouts.admin')
@section('title', 'Admin - Posts')

@section('content')

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
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    @endif

    </tbody>
    </table>
    

@endsection
