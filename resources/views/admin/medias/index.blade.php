@extends('layouts.admin')

@section('content')


    <h1> Media </h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th></th>   
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>

        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <th>{{ $photo->id }}</th>
                    <td><img height="100" src="{{ $photo->file }}" class="img-rounded" alt=""></td>
                    <td>
                        {!! Form::open(['action' => ['AdminMediasController@destroy', $photo->id], 'method' => 'delete']) !!}
                            {!! Form::submit('X', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>{{ $photo->created_at->diffForHumans() }}</td>
                    <td>{{ $photo->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    


@endsection
