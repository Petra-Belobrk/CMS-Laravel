@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

@endsection

@section('content')

    <h1>Media Upload</h1>

    {!! Form::open(['method' => 'post', 'action' => 'AdminMediasController@store', 'class' => 'dropzone']) !!}


    {!! Form::close() !!}


@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

@endsection
