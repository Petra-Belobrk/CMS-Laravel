@include('front.home_header')



<!-- Navigation -->
@include('front.home_nav')

<!-- Page Content -->
@include('includes.flash_message')
@yield('content')



    <!-- /.row -->
    @include('front.home_footer')

