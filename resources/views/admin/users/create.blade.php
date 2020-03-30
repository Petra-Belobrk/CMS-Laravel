@extends('layouts.admin')

@section('content')

    <h1>Create User</h1>

    {!! Form::open(['method' => 'post', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', ['' => 'Choose Role'] + $roles, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], 0, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('file', 'Title:') !!}
        {!! Form::file('file', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-info']) !!}
    </div>

    {!! Form::close() !!}

   @include('includes.errors')

@endsection
