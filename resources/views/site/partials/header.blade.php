<header class="section-header">
      <section class="header-main bg-dark p-0">
            <div class="container">
                  <div class="row align-items-start">
                        <div class="col-sm-5 col-md-4 offset-md-2 pt-2">
                              <form action="{{ route('search') }}" class="search-wrap">
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
                        <div class="col-sm-3 col-md-3 offset-sm-3">
                              <div class="widgets-wrap d-flex justify-content-center">
                                    <div class="widget-header mt-md-1 mt-lg-0">
                                          <a href="{{route('cart.index')}}" class="icontext">
                                                <div class="icon-wrap icon-xs bg2 round text-success mt-2">
                                                      <i class="fa fa-shopping-cart"></i>
                                                </div>
                                          </a>
                                    </div>
                                    @guest
                                          <div class="widget-header m-0">
                                                <a href="{{ route('login') }}" class="ml-3 icontext mt-2">
                                                      <div class="icon-wrap icon-xs bg-primary round text-white"><i class="fa fa-user"></i></div>
                                                      <div class="text-wrap"><h5 class="text-light mt-1">Login</h5></div>
                                                </a>
                                          </div>
                                          <div class="widget-header m-0">
                                                <a href="{{ route('register') }}" class="ml-3 icontext mt-2">
                                                      <div class="icon-wrap icon-xs bg-success round text-white"><i class="fa fa-user"></i></div>
                                                      <div class="text-wrap"><h5 class="text-light mt-1">Signup</h5></div>
                                                </a>
                                          </div>
                                    @else
                                          <ul class="navbar-nav ml-auto">
                                                <li class="nav-item dropdown">
                                                      @can('add product')
                                                            <a style="font-size: 20px; width: 200px" id="navbarDropdown" class="nav-link dropdown-toggle text-warning text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                  {{ Auth::user()->full_name }}<span class="caret"></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                                  <a class="dropdown-item" href="{{route('admin.dashboard')}}">Admin Panel</a>
                                                                  <div class="dropdown-divider"></div>
                                                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                                                     onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                                        {{ __('Logout') }}
                                                                  </a>
                                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                        @csrf
                                                                  </form>
                                                            </div>
                                                      @else
                                                            <a style="font-size: 20px; width: 200px" id="navbarDropdown" class="nav-link dropdown-toggle text-light text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                  {{ Auth::user()->full_name }}<span class="caret"></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                                  <a class="dropdown-item" href="{{route('profile.show')}}">Profile</a>
                                                                  <div class="dropdown-divider"></div>
                                                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                                        {{ __('Logout') }}
                                                                  </a>
                                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                        @csrf
                                                                  </form>
                                                            </div>
                                                      @endcan
                                                </li>
                                          </ul>
                                    @endguest
                              </div>
                        </div>
                  </div>
            </div>
      </section>
      @include('site.partials.nav')
</header>