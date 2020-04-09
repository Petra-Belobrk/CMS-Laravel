@extends('layouts.admin')

@section('content')

    @if(Session::has('delete_post'))
        <p class="bg-danger">{{session('delete_post')}}</p>
    @endif

    @if(Session::has('edit_post'))
        <p class="bg-success">{{session('edit_post')}}</p>
    @endif

    @if(Session::has('create_post'))
        <p class="bg-success">{{session('create_post')}}</p>
    @endif

<h1>Posts</h1>

    <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Username</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>

            @if($posts)

                @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td><img height="50px" src="{{$post->photo ? $post->photo->file : '/images/placeholder.jpg'}}" alt=""></td>
                <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->created_at->toDateTimeString()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
                <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>

            </tr>
                @endforeach

            @else

            <h2 class="text-center">There are no posts</h2>

            @endif
            </tbody>
        </table>

@endsection
