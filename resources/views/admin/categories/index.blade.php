@extends('layouts.admin')

@section('content')

<h1>Categories</h1>

<div class="col-sm-4">

    {!! Form::open(['method' => 'post', 'action' => 'AdminCategoriesController@store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Category', ['class'=>'btn btn-info']) !!}
    </div>

    {!! Form::close() !!}


</div>

<div class="col-sm-2">

</div>

<div class="col-sm-6">

    @if($categories)

        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at->toDateTimeString()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

</div>

@endsection
