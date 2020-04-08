{{--<header class="section-header">--}}
{{--      <section class="header-main bg-dark p-0">--}}
{{--            <div class="container">--}}
{{--                  <div class="row align-items-start">--}}
{{--                        <div class="col-sm-7 col-md-6 offset-md-2 pt-2 m-0 ml-lg-5">--}}
{{--                              <form action="{{ route('search') }}" class="search-wrap">--}}
{{--                                    <div class="input-group">--}}
{{--                                          <input type="search" name="search" class="form-control" placeholder="Search">--}}
{{--                                          <div class="input-group-append">--}}
{{--                                                <button class="btn btn-primary" type="submit">--}}
{{--                                                      <i class="fa fa-search"></i>--}}
{{--                                                </button>--}}
{{--                                          </div>--}}
{{--                                    </div>--}}
{{--                              </form>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-3 col-md-3 offset-sm-2">--}}
{{--                              <div class="widgets-wrap d-flex justify-content-center">--}}
{{--                                    <div class="widget-header mt-md-1 mt-lg-0">--}}
{{--                                          <a href="{{route('cart.index')}}" class="icontext">--}}
{{--                                                <div class="icon-wrap icon-xs bg2 round text-success mt-2">--}}
{{--                                                      <i class="fa fa-shopping-cart"></i>--}}
{{--                                                </div>--}}
{{--                                          </a>--}}
{{--                                    </div>--}}
{{--                                    @guest--}}
{{--                                          <div class="widget-header m-0">--}}
{{--                                                <a href="{{ route('login') }}" class="ml-3 icontext mt-2">--}}
{{--                                                      <div class="icon-wrap icon-xs bg-primary round text-white"><i class="fa fa-user"></i></div>--}}
{{--                                                      <div class="text-wrap"><h5 class="text-light mt-1">Login</h5></div>--}}
{{--                                                </a>--}}
{{--                                          </div>--}}
{{--                                          <div class="widget-header m-0">--}}
{{--                                                <a href="{{ route('register') }}" class="ml-3 icontext mt-2">--}}
{{--                                                      <div class="icon-wrap icon-xs bg-success round text-white"><i class="fa fa-user"></i></div>--}}
{{--                                                      <div class="text-wrap"><h5 class="text-light mt-1">Signup</h5></div>--}}
{{--                                                </a>--}}
{{--                                          </div>--}}
{{--                                    @else--}}
{{--                                          <ul class="navbar-nav ml-auto">--}}
{{--                                                <li class="nav-item dropdown">--}}
{{--                                                      @can('add product')--}}
{{--                                                            <a style="font-size: 20px; width: 200px" id="navbarDropdown" class="nav-link dropdown-toggle text-warning text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                                                  {{ Auth::user()->full_name }}<span class="caret"></span>--}}
{{--                                                            </a>--}}
{{--                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                                                  <a class="dropdown-item" href="{{route('admin.dashboard')}}">Admin Panel</a>--}}
{{--                                                                  <div class="dropdown-divider"></div>--}}
{{--                                                                  <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                                                     onclick="event.preventDefault();--}}
{{--                                                           document.getElementById('logout-form').submit();">--}}
{{--                                                                        {{ __('Logout') }}--}}
{{--                                                                  </a>--}}
{{--                                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                                                        @csrf--}}
{{--                                                                  </form>--}}
{{--                                                            </div>--}}
{{--                                                      @else--}}
{{--                                                            <a style="font-size: 20px; width: 200px" id="navbarDropdown" class="nav-link dropdown-toggle text-light text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                                                  {{ Auth::user()->full_name }}<span class="caret"></span>--}}
{{--                                                            </a>--}}
{{--                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                                                  <a class="dropdown-item" href="{{route('profile.show')}}">Profile</a>--}}
{{--                                                                  <div class="dropdown-divider"></div>--}}
{{--                                                                  <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                                                     onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                                                        {{ __('Logout') }}--}}
{{--                                                                  </a>--}}
{{--                                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                                                        @csrf--}}
{{--                                                                  </form>--}}
{{--                                                            </div>--}}
{{--                                                      @endcan--}}
{{--                                                </li>--}}
{{--                                          </ul>--}}
{{--                                    @endguest--}}
{{--                              </div>--}}
{{--                        </div>--}}
{{--                  </div>--}}
{{--            </div>--}}
{{--      </section>--}}
{{--      @include('site.partials.nav')--}}
{{--</header>--}}


<nav class="navbar navbar-expand-md navbar-dark bg-dark pb-0 pr-5 pl-5">
    <a class="nav-link text-light p-0 mt-2" href="{{ url('/') }}" ><h4>Home</h4></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="ml-3 icontext mt-2">
                    <div class="text-wrap"><h4 class="text-light">Login</h4></div>
                </a>
                <a href="{{ route('register') }}" class="ml-3 icontext mt-2">
                    <div class="text-wrap"><h4 class="text-light">Signup</h4></div>
                </a>
                <a href="{{route('cart.index')}}" class="ml-3 icontext mt-2">
                    <div class="text-wrap"><h4 class="text-light mt-1"><i class="fa fa-shopping-cart"></i></h4></div>
                </a>
            </li>
            @else
                <li class="nav-item text-left">
                    @can('add product')
                        <a href="{{route('admin.dashboard')}}" class="ml-3 icontext mt-2">
                            <div class="text-wrap"><h4 class="text-warning">{{ Auth::user()->full_name }}</h4></div>
                        </a>
                    @else
                        <a href="{{route('profile.show')}}" class="ml-3 icontext mt-2">
                            <div class="text-wrap"><h4 class="text-light">{{ Auth::user()->full_name }}</h4></div>
                        </a>
                    @endcan
                        <a href="{{ route('logout') }}" class="ml-3 icontext mt-2" onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                            <div class="text-wrap"><h4 class="text-light">{{ __('Logout') }}</h4></div>
                        </a>
                        <a href="{{route('cart.index')}}" class="ml-3 icontext mt-2">
                            <div class="text-wrap"><h4 class="text-light mt-1"><i class="fa fa-shopping-cart"></i></h4></div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
            @endguest
        </ul>
        <form action="{{ route('search') }}" class="search-wrap my-2 my-md-0">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</nav>
@include('site.partials.nav')
