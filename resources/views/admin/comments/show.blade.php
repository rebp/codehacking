@extends('layouts.admin')

@section('content')

    @if(count($comments) > 0)

        <h1>Comments</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th></th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>

            @if($comments)
                @foreach($comments as $comment)
                    <tr>
                        <th>{{ $comment->id }}</th>
                        <td>{{ $comment->author }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>body</td>
                        <td><a href="{{ route('home.post', $comment->post->id) }}">View Post</a></td>
                        <td><a href="{{ route('admin.comment.replies.show', $comment->id) }}">View Replies</a></td>
                        <td>

                            @if($comment->is_active == 1)
                                {!! Form::open((['action' => ['PostCommentsController@update', $comment->id], 'method' => 'patch'])) !!}

                                    <div class="form-group">
                                        {!! Form::hidden('is_active', 1) !!}
                                        {!! Form::submit('Unaprove', ['class' => 'btn btn-info']) !!}

                                    </div>

                                {!! Form::close() !!}	
                            @else
                                {!! Form::open((['action' => ['PostCommentsController@update', $comment->id], 'method' => 'patch'])) !!}

                                    <div class="form-group">
                                        {!! Form::hidden('is_active', 0) !!}
                                        {!! Form::submit('Aprove', ['class' => 'btn btn-success']) !!}

                                    </div>

                                {!! Form::close() !!}	
                            @endif
                        
                        </td>
                        <td>
                            {!! Form::open((['action' => ['PostCommentsController@destroy', $comment->id], 'method' => 'delete'])) !!}

                                <div class="form-group">

                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                </div>

                            {!! Form::close() !!}	
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    @else
        <h1>No Comments</h1>
    @endif

@endsection