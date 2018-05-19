@include('partials._head')

<body>

<div class="wrap">
    @include('partials._title')

    <div class="row">
        <div class="col-md-10 col-md-offset-1 bg-cont" style="background-image: url({{asset('assets/bg-photo.png')}});  background-size: cover;">
           @include('partials._nav')

           @yield('content')

           @include('partials._footer')
        </div>
    </div>

</div> <!-- end wrap -->

</body>
</html>
