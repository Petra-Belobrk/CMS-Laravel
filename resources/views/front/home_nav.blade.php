<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::guest())
                    <li>
                        <a href="{{url('/login')}}">Login</a>
                    </li>
                    <li>
                        <a href="{{url('/register')}}">Register</a>
                    </li>

                    @else
                    <li>
                        <a href="{{url('/admin')}}">Admin</a>
                    </li><li>
                        <a href="{{url('/logout')}}">Logout</a>
                    </li>

                @endif
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div class="container">
