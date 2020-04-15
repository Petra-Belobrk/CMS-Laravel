<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        {!! Form::open(['method' => 'post', 'action' => 'HomeController@searchResults']) !!}

        <div class="input-group">


            {!! Form::text('search', null, ['class'=>'form-control']) !!}

            <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
    </div>
            {!! Form::close() !!}


        {{--<div class="input-group">--}}
            {{--<input type="text" class="form-control">--}}
            {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-default" type="button">--}}
                                {{--<span class="glyphicon glyphicon-search"></span>--}}
                        {{--</button>--}}
                        {{--</span>--}}
        {{--</div>--}}





        <!-- /.input-group -->


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    @if($categories)
                        @foreach($categories as $category)

                    <li><a href="{{url('category/'.$category->id)}}">{{$category->name}}</a>
                    </li>

                        @endforeach
                    @endif

                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>
