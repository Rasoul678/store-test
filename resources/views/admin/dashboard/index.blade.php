@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="widget-small primary coloured-icon bg-secondary text-light">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4 class="text-capitalize">Users</h4>
                    <p><b>{{ $users_all}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="widget-small info coloured-icon bg-secondary text-light">
                <i class="icon fa fa-shopping-cart fa-3x"></i>
                <div class="info">
                    <h4 class="text-capitalize">Products</h4>
                    <p><b>{{ $products_count }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="widget-small danger coloured-icon bg-secondary text-light">
                <i class="icon fa fa-tags fa-3x"></i>
                <div class="info">
                    <h4 class="text-capitalize">Categories</h4>
                    <p><b>{{ $categories_count }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="widget-small warning coloured-icon bg-secondary text-light">
                <i class="icon fa fa-truck fa-3x"></i>
                <div class="info">
                    <h4 class="text-capitalize">Orders</h4>
                    <p><b>{{ $orders_count }}</b></p>
                </div>
            </div>
            @role('SuperAdmin')
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Roles</h4>
                        <a href="{{route('admin.roles.index')}}" class="btn btn-primary">Role</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Permissions</h4>
                        <a href="{{route('admin.permissions.index')}}" class="btn btn-primary">Permission</a>
                    </div>
                </div>
            </div>
            @endrole
        </div>
    </div>
@endsection
