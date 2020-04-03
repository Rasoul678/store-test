<aside>
    <ul  class="list-unstyled">
        <li>
            <div class="text-center mt-5">
                <i class="material-icons text-light" style="font-size: 80px;">account_circle</i>
            </div>
        </li>
        <li>
            <h3 class="text-center text-warning mt-3">
                {{ $admin_name }}
            </h3>
            @can('add admin')
            <h3 class="text-center text-warning mt-3">
                <span class="badge badge-warning">Super Admin</span>
            </h3>
                @else
                <h5 class="text-center text-warning mt-3">
                    <span class="badge badge-warning">Admin</span>
                </h5>
            @endcan
        </li>
        <li class="mt-5 {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
            <h4>
                <a class="nav-link text-light" href="{{ route('admin.dashboard') }}"><i class="material-icons">view_quilt</i> Dashboard <span class="sr-only">(current)</span></a>
            </h4>
        </li>
        <li class=" {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
            <h4>
                <a class="nav-link text-light" href="{{route('admin.categories.index')}}"><i class="material-icons">style</i> Categories </a>
            </h4>
        </li>
        <li class=" {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}">
            <h4>
                <a class="nav-link text-light" href="{{route('admin.products.index')}}"><i class="material-icons">local_mall</i> Products </a>
            </h4>
        </li>
        <li class=" {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}">
            <h4>
                <a class="nav-link text-light" href="{{route('admin.orders.index')}}"><i class="material-icons">shopping_cart</i> Orders </a>
            </h4>
        </li>
        <li class="nav-item">
            <h4>
                <a class="nav-link text-light" href="{{ route('logout') }}"
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
</aside>
