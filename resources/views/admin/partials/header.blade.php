<header class="app-header">
    <a class="app-header__logo" href="{{route('home')}}">{{ config('app.name') }}</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <h4 class="text-light pt-2">{{ $admin_name }}</h4>
        </li>
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('profile.show')}}"><i class="fa fa-user fa-lg"></i> Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>




{{--<nav class="navbar navbar-expand-lg navbar-light bg-secondary">--}}
{{--    <a class="navbar-brand text-warning" href="{{route('home')}}"><h2><strong>Store</strong></h2></a>--}}
{{--    <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--        <ul class="navbar-nav">--}}
{{--            <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">--}}
{{--                <h4>--}}
{{--                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{ route('admin.dashboard') }}"><i class="material-icons">view_quilt</i> Dashboard <span class="sr-only">(current)</span></a>--}}
{{--                </h4>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">--}}
{{--                <h4>--}}
{{--                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{route('admin.categories.index')}}"><i class="material-icons">style</i> Categories </a>--}}
{{--                </h4>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}">--}}
{{--                <h4>--}}
{{--                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{route('admin.products.index')}}"><i class="material-icons">local_mall</i> Products </a>--}}
{{--                </h4>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}">--}}
{{--                <h4>--}}
{{--                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{route('admin.orders.index')}}"><i class="material-icons">shopping_cart</i> Orders </a>--}}
{{--                </h4>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <h4>--}}
{{--                    <a class="nav-link text-light border border-secondary rounded-lg" href="{{ route('logout') }}"--}}
{{--                       onclick="event.preventDefault();--}}
{{--                                                 document.getElementById('logout-form').submit();">--}}
{{--                        <i class="material-icons">power_settings_new</i>--}}
{{--                        {{ __('Logout') }}--}}
{{--                    </a>--}}

{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
{{--                </h4>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}
