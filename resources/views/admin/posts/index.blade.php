@extends('layouts.admin')

@section('content')

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
                <td>{{$post->user->name}}</td>
                <td>{{$post->category_id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->created_at->toDateTimeString()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
                @endforeach

            @else

            <h2 class="text-center">There are no posts</h2>

            @endif
            </tbody>
        </table>

@endsection
