@extends('layouts.blog-post')


@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by {{$post->user->name}}
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->format('d.m.Y h:i:s')}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : '/images/placeholder.jpg'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{!! $post->body !!}</p>


    <hr>





    {{--<div id="disqus_thread"></div>--}}
    {{--<script>--}}

        {{--/**--}}
         {{--*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.--}}
         {{--*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/--}}
        {{--/*--}}
        {{--var disqus_config = function () {--}}
        {{--this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable--}}
        {{--this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable--}}
        {{--};--}}
        {{--*/--}}
        {{--(function() { // DON'T EDIT BELOW THIS LINE--}}
            {{--var d = document, s = d.createElement('script');--}}
            {{--s.src = 'https://codehacking-fjpmpmybvl.disqus.com/embed.js';--}}
            {{--s.setAttribute('data-timestamp', +new Date());--}}
            {{--(d.head || d.body).appendChild(s);--}}
        {{--})();--}}
    {{--</script>--}}
    {{--<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>--}}
    {{--<script id="dsq-count-scr" src="//codehacking-fjpmpmybvl.disqus.com/count.js" async></script>--}}








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
            <img class="media-object" height="64px" src="{{Auth::user()->gravatar}}" alt="">
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
