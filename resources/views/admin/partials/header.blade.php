<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}"><h2><strong>Store</strong></h2></a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="material-icons">view_quilt</i> Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.categories.index')}}"><i class="material-icons">style</i> Categories </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.products.index')}}"><i class="material-icons">local_mall</i> Products </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.orders.index')}}"><i class="material-icons">shopping_cart</i> Orders </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logout') }}"><i class="material-icons">power_settings_new</i> Logout </a>
            </li>
        </ul>
    </div>
</nav>
