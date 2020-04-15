@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    <div class="col-sm-6">

        @if($photos)

            {!! Form::open(['method' => 'post', 'action' => ['AdminMediasController@deleteMedia'], 'class'=>'form-inline']) !!}

            <div class="form-group">
                {!! Form::select('checkBoxArray', ['delete'=>'Delete'], null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Delete Photo', ['class'=>'btn-primary']) !!}
            </div>



            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
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
            {!! Form::close() !!}
        @endif

    </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#options').click(function() {
            if(this.checked) {
                $('.checkBoxes').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkBoxes').each(function() {
                    this.checked = false;
                });
            }
        })
    })
</script>
@endsection
