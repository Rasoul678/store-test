<aside>
    <ul  class="sidebar">
        <li>
            <a class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="material-icons">view_quilt</i> Dashboard</a>
        </li>
        <li>
            <a class="{{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" href="{{ route('admin.categories.index') }}"><i class="material-icons">style</i> Categories</a>
        </li>
        <li>
            <a class="{{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" href="{{ route('admin.products.index') }}"><i class="material-icons">local_mall</i> Products</a>
        </li>
        <li>
            <a class="{{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}" href="{{ route('admin.orders.index') }}"><i class="material-icons">shopping_cart</i> Orders</a>
        </li>
    </ul>
</aside>
