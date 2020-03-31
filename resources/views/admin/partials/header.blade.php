<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <a class="navbar-brand text-warning" href="{{route('home')}}"><h2><strong>Store</strong></h2></a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                <h4>
                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{ route('admin.dashboard') }}"><i class="material-icons">view_quilt</i> Dashboard <span class="sr-only">(current)</span></a>
                </h4>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
                <h4>
                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{route('admin.categories.index')}}"><i class="material-icons">style</i> Categories </a>
                </h4>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}">
                <h4>
                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{route('admin.products.index')}}"><i class="material-icons">local_mall</i> Products </a>
                </h4>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}">
                <h4>
                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{route('admin.orders.index')}}"><i class="material-icons">shopping_cart</i> Orders </a>
                </h4>
            </li>
            <li class="nav-item">
                <h4>
                    <a class="nav-link text-light border border-secondary rounded-lg" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <i class="material-icons">power_settings_new</i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </h4>
            </li>
        </ul>
    </div>
</nav>
