@extends('layouts.blog-home')

@section('content')


    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            {{--<h1 class="page-header">--}}
                {{--Page Heading--}}
                {{--<small>Secondary Text</small>--}}
            {{--</h1>--}}

            <!-- First Blog Post -->

            @if($posts)

                @foreach($posts as $post)

            <h2>
                <a href="post/{{$post->slug}}">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by {{$post->user->name}}
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->format('d.m.Y h:i:s')}}</p>
            <hr>
            <img class="img-responsive" width="900px" height="300px" src="{{$post->photo ? $post->photo->file : '/images/placeholder.jpg'}}" alt="">
            <hr>
            <p>{!! str_limit($post->body, 150) !!}</p>
            <a class="btn btn-primary" href="post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

                @endforeach

            @endif


            <!-- Pagination -->
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">{{$posts->render()}}</div>
                </div>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        @include('front.home_sidebar')

    </div>




@endsection
