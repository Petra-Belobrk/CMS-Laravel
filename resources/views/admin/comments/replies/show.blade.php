@extends('layouts.admin')

@section('content')

    @if(count($replies))
        <h1>Comment Replies</h1>

        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Post title</th>
                <th scope="col">Author</th>
                <th scope="col">Body</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <th scope="row">{{$reply->id}}</th>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->email}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">View Post</a></td>
                    <td>

                        @if($reply->is_active == 1)
                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id], ]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Deny Comment', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id], ]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve Comment', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}


                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id], ]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Replies</h1>
    @endif

@endsection
