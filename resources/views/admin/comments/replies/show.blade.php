@extends('layouts.admin')

@section('content')

    @if(count($replies) > 0)

        <h1>Replies</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            @if($replies)
                @foreach($replies as $reply)
                    <tr>
                        <th>{{ $reply->id }}</th>
                        <td>{{ $reply->author }}</td>
                        <td>{{ $reply->email }}</td>
                        <td>{{ $reply->body }}</td>
                        <td><a href="{{ route('home.post', $reply->comment->post->id) }}">View Post</a></td>                        
                        <td>

                            @if($reply->is_active == 1)
                                 {!! Form::open((['action' => ['CommentRepliesController@update', $reply->id], 'method' => 'patch'])) !!}

                                    <div class="form-group">
                                        {!! Form::hidden('is_active', 0) !!}
                                        {!! Form::submit('Unaprove', ['class' => 'btn btn-success']) !!}

                                    </div>

                                {!! Form::close() !!}	
                            @else
                                {!! Form::open((['action' => ['CommentRepliesController@update', $reply->id], 'method' => 'patch'])) !!}

                                    <div class="form-group">
                                        {!! Form::hidden('is_active', 1) !!}
                                        {!! Form::submit('Aprove', ['class' => 'btn btn-info']) !!}

                                    </div>

                                {!! Form::close() !!}	
                            @endif
                        
                        </td>
                        <td>
                            {!! Form::open((['action' => ['CommentRepliesController@destroy', $reply->id], 'method' => 'delete'])) !!}

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
        <h1>No Replies</h1>
    @endif

@endsection