
@include('front.home_header')

<!-- Navigation -->

@include('front.home_nav')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->

        <div class="col-lg-8">
            @include('includes.flash_message')

           @yield('content')

        </div>
        <!-- Blog Sidebar Widgets Column -->

        @include('front.home_sidebar')

    </div>
    <!-- /.row -->
    @include('front.home_footer')
