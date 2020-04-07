<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <h4><p class="app-sidebar__user-name">{{ $admin_name }}</p></h4>
            @can('add admin')
                <h4>
                    <p class="app-sidebar__user-designation badge badge-warning">Super Admin</p>
                </h4>
            @else
                <h4>
                    <p class="app-sidebar__user-designation badge badge-primary">Admin</p>
                </h4>
            @endcan
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Users</span>
                <i class="treeview-indicator fa fa-chevron-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('admin.users.index') }}" rel="noopener noreferrer"><i class="icon fa fa-chevron-right"></i> All Users<span class="badge badge-primary ml-5">{{ $users_all}}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('admin.users.index',['admins'])}}"><i class="icon fa fa-chevron-right"></i> Admins<span class="badge badge-light ml-5">{{ $admins_count + $superAdmin_count }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('admin.users.index',['customers'])}}"><i class="icon fa fa-chevron-right"></i> Customers<span class="badge badge-light ml-4">{{ $customers_count }}</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" href="{{route('admin.categories.index')}}"><i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" href="{{route('admin.products.index')}}"><i class="app-menu__icon fa fa-shopping-bag"></i>
                <span class="app-menu__label">Products</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}" href="{{route('admin.orders.index')}}"><i class="app-menu__icon fa fa-truck"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
                <i class="treeview-indicator fa fa-chevron-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="#" rel="noopener noreferrer"><i class="icon fa fa-chevron-right"></i> Roles</a>
                </li>
                <li>
                    <a class="treeview-item" href="#"><i class="icon fa fa-chevron-right"></i> Permissions</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>