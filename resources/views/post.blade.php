@extends('layouts.blog-post')


@section('blog')

    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{ $post->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

        <hr>

        <!-- Preview Image -->
        <img src="{{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/900x300'}}" class="img-rounded img-responsive" alt="">

        <hr>

        <!-- Post Content -->
        <p>{{ $post->body }}</p>

        <hr>

        <!-- Blog Comments -->

        @if(Auth::check())

        <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                {!! Form::open((['action' => 'PostCommentsController@store', 'method' => 'post'])) !!}

                    <div class="form-group">

                    {!! Form::label('body', 'Body') !!}
                    
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}                   

                    </div>

                    <div class="form-group">                   
                    
                    {!! Form::submit('Submit Message', ['class' => 'btn btn-success']) !!}     
                    
                    {!! Form::hidden('post_id', $post->id) !!}
                                                    

                    </div>

                {!! Form::close() !!}	
            </div>
        @endif

        <hr>

        <!-- Posted Comments -->

    @if(count($comments) > 0)

        @foreach($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{ $comment->photo }}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->author }}
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </h4>
                    <p>{{ $comment->body }}</p>

                    @if($comment->replies)

                        @foreach($comment->replies as $reply)

                            <!-- Nested Comment -->
                            <div class="nested-comment media">
                                <a class="pull-left" href="#">
                                    <img height="64" class="media-object" src="{{ $reply->photo }}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $reply->author }}
                                        <small>{{ $reply->created_at->diffForHumans() }}</small>
                                    </h4>
                                    <p>{{ $reply->body }}</p>
                                </div>
                            </div>
                            <!-- End Nested Comment -->

                        @endforeach

                        <div class="comment-reply-container">

                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                            <div class="comment-reply">

                                {!! Form::open(['action' => 'CommentRepliesController@createReply', 'method' => 'post']) !!}

                                <div class="form-group">

                                    {!! Form::label('body', 'Reply') !!}

                                    {!! Form::textarea('body', null, ['class' => 'form-control', 'size' => '5x5']) !!}

                                </div>  

                                <div class="form-group">
                                
                                {!! Form::hidden('comment_id', $comment->id) !!}
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

                                </div>

                                {!! Form::close() !!}

                            </div>

                        </div>

                    @endif

                </div>
            </div>
        @endforeach

    @endif


    </div>
    
@endsection

@section('scripts')

    <script>
            $('.toggle-reply').on('click', function(e){
                $(e.target.nextElementSibling).slideToggle('slow');
            });
    </script>
    
@endsection