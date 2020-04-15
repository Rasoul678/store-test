<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <h4><p class="app-sidebar__user-name">{{ $user_name }}</p></h4>
            <h4>
            @foreach($role_names as $role_name)
                <p class="app-sidebar__user-designation badge badge-warning">{{$role_name}}</p>
            @endforeach
            </h4>
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
                    <a class="treeview-item" href="{{ route('admin.users.index') }}" rel="noopener noreferrer"><span class="badge badge-primary mr-2">{{ $users_all}}</span><i class="icon fa fa-chevron-right"></i> All Users</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('admin.users.index',['admins'])}}"><span class="badge badge-primary mr-2">{{ $admins_count}}</span><i class="icon fa fa-chevron-right"></i> Admins</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('admin.users.index',['customers'])}}"><span class="badge badge-primary mr-2">{{ $customers_count }}</span><i class="icon fa fa-chevron-right"></i> Customers</a>
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
                    <a class="treeview-item" href="{{route('admin.roles.index')}}" rel="noopener noreferrer"><i class="icon fa fa-chevron-right"></i> Roles</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('admin.permissions.index')}}"><i class="icon fa fa-chevron-right"></i> Permissions</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('admin.cities.index')}}"><i class="icon fa fa-chevron-right"></i> Cities</a>
                </li>
{{--                <li>--}}
{{--                    <a class="treeview-item" href="#"><i class="icon fa fa-chevron-right"></i> Other</a>--}}
{{--                </li>--}}
            </ul>
        </li>
    </ul>
</aside>
