<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><h1><strong class="text-light">Store</strong></h1></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav category">
                <li class="nav-item">
                    <a class="nav-link" href="#category.show">
                        <h5><strong class="text-light">Category</strong></h5>
                    </a>

                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><h4><strong class="text-light">{{ __('Login') }}</strong></h4> </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><h4><strong class="text-light">{{ __('Sign Up') }}</strong></h4></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a href="{{route('cart.index')}}" class="nav-link">
                            <h4><strong class="text-light"><i class="material-icons">shopping_cart</i></strong></h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile')}}">
                            <h4 class="text-light">{{ Auth::user()->full_name }}</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <h4><strong class="text-light">{{ __('Logout') }}</strong></h4>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>