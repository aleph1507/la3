<div class="row"><!-- nav row -->
   <div class="col-md-12 "> <!-- nav col -->
       <nav class="navbar no-margin navbar-default ">
           <div class="container-fluid">
           <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                    </button>

                   <a class="navbar-brand" href="#"></a>
               </div>

             <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav">
                   {{-- <li class="active"><a href="{{route('home')}}"><img class='nav-img-w' src="{{secure_asset('assets/home.png')}}"> <span class="sr-only">(current)</span></a></li> --}}
                   {{-- <li><a href="{{route('about_book')}}"><img class='nav-img-w' src="{{secure_asset('assets/about_the_book.png')}}"></a></li>
                   <li><a href="{{route('about_us')}}"><img class='nav-img-w' src="{{secure_asset('assets/about_us.png')}}"></a></li>
                   <li><a href="{{route('buy_the_book')}}"><img class='nav-img-w' src="{{secure_asset('assets/buy_the_book.png')}}"></a></li>
                   <li><a href="{{route('contact')}}"><img class='nav-img-w' src="{{secure_asset('assets/contact.png')}}"></a></li> --}}
                   <li class="active"><a href="{{route('home')}}"><img class='nav-img-w' src="{{asset('assets/home.png')}}"> <span class="sr-only">(current)</span></a></li>
                   <li><a href="{{route('about_book')}}"><img class='nav-img-w' src="{{asset('assets/about_the_book.png')}}"></a></li>
                   <li><a href="{{route('about_us')}}"><img class='nav-img-w' src="{{asset('assets/about_us.png')}}"></a></li>
                   <li><a href="{{route('buy_the_book')}}"><img class='nav-img-w' src="{{asset('assets/buy_the_book.png')}}"></a></li>
                   <li><a href="{{route('contact')}}"><img class='nav-img-w' src="{{asset('assets/contact.png')}}"></a></li>
                   @if(Auth::check())
                     {{-- <li><a href="{{route('profile')}}"><img class='nav-img-w' src="{{secure_asset('assets/profile.png')}}" alt="Profile"></a></li> --}}
                     <li><a href="{{route('profile')}}"><img class='nav-img-w' src="{{asset('assets/profile.png')}}" alt="Profile"></a></li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                     <li><a href="{{route('logout')}}"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       {{-- <img class='nav-img-w' src="{{secure_asset('assets/logout.png')}}"></a> --}}
                       <img class='nav-img-w' src="{{asset('assets/logout.png')}}"></a>
                     </li>
                   @else
                     {{-- <li><a href="{{route('register')}}"><img class='nav-img-w' src="{{secure_asset('assets/sell_our_book.png')}}"></a></li> --}}
                     <li><a href="{{route('register')}}"><img class='nav-img-w' src="{{asset('assets/sell_our_book.png')}}"></a></li>
                   @endif
                 </ul>
               </div><!-- /.navbar-collapse -->
           </div><!-- /.container-fluid -->
      </nav>
 </div> <!-- end nav col-->
</div><!-- end nav row-->
