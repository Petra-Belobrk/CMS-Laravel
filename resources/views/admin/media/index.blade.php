@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    <div class="col-sm-6">

        @if($photos)

            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <th scope="row">{{$photo->id}}</th>
                        <td><img height="50px" src="{{$photo->file}}" alt=""></td>
                        <td>{{$photo->created_at->toDateTimeString()}}</td>
                        <td>

                            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}

                            <div class="form-group">
                                {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
                            </div>

                            {!! Form::close() !!}



                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection
