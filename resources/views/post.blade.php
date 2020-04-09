@extends('layouts.blog-post')


@section('content')
    @if(Session::has('comment_create'))
        <p class="bg-success">{{session('comment_create')}}</p>
    @endif

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="{{$post->user->name}}">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->format('d.m.Y h:i:s')}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : '/images/placeholder.jpg'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>


    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    @if(\Illuminate\Support\Facades\Auth::check())
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method' => 'post', 'action' => 'PostCommentsController@store']) !!}

        <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="form-group">
            {!! Form::label('body', 'Comment:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3])!!}

        </div>
        <div class="form-group">
            {!! Form::submit('Post Comment', ['class'=>'btn btn-info']) !!}
        </div>


        {!! Form::close() !!}


    </div>
    <hr>

    <!-- Posted Comments -->
@if(count($comments) > 0)
    @foreach($comments as $comment)
    <!-- Comment -->
    <div class="comment-reply-container">

        <button class="toggle-reply btn btn-primary pull-right">Reply</button>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" height="64px" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->format('d.m.Y @ h:i:s')}}</small>
            </h4>
            {{$comment->body}}
        </div>


        <!-- Nested Comment -->
            @if($comment->replies)
                @foreach($comment->replies as $reply)
                    @if($reply->is_active == 1)

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object"  height="64px" src="{{$reply->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$reply->author}}
                        <small>{{$reply->created_at->format('d.m.Y @ h:i:s')}}</small>
                    </h4>
                    {{$reply->body}}
                </div>

                    </div>
                @endif
                @endforeach
            @endif
                <div class="comment-reply">
                {!! Form::open(['method' => 'post', 'action' => 'CommentRepliesController@createReply']) !!}
                <input type="hidden" name="comment_id" value="{{$comment->id}}">


                <div class="form-group">
                    {!! Form::label('body', 'Reply:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Submit Reply', ['class'=>'btn btn-info']) !!}
                </div>

                {!! Form::close() !!}

                </div>

            <!-- End Nested Comment -->

    </div>
    </div>

    @endforeach
@endif

    @endif

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
           $('.comment-reply').hide();
        });

        $('.toggle-reply').click(function () {
            $(this).siblings('.media').find('.comment-reply').slideToggle("slow");
        })

    </script>
@endsection
