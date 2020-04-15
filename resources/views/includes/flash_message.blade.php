@if(Session::has('comment_create'))
    <p class="alert alert-success text-center">{{session('comment_create')}}</p>
@endif
