<header class="app-header">
    <a class="app-header__logo" href="{{route('home')}}">{{ config('app.name') }}</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <h4 class="text-light pt-2">{{ $user_name }}</h4>
        </li>
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
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