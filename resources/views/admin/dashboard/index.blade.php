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
        </div>
    </div>
@endsection










{{--@extends('admin.app')--}}
{{--@section('title') Dashboard @endsection--}}
{{--@section('content')--}}
{{--    <div class="container-fluid mt-4">--}}
{{--        <h1 class="mt-2 text-center"> Dashboard</h1>--}}
{{--        <div class="row mt-5">--}}
{{--            <div class="col-md-2">--}}
{{--                <div class="card bg-dark">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title text-white">Products</h4>--}}
{{--                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">{{ $products_count }}</span></h4>--}}
{{--                        <a href="{{route('admin.products.index')}}" class="btn btn-primary">Products</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-2">--}}
{{--                <div class="card bg-dark">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title text-white">Categories</h4>--}}
{{--                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">{{ $categories_count }}</span></h4>--}}
{{--                        <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Categories</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-2">--}}
{{--                <div class="card bg-dark">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title text-white">Orders</h4>--}}
{{--                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">{{ $orders_count }}</span></h4>--}}
{{--                        <a href="{{route('admin.orders.index')}}" class="btn btn-primary">Orders</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-2">--}}
{{--                <div class="card bg-dark">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title text-white">Admins</h4>--}}
{{--                        <h4 class="card-subtitle mb-2 text-white"><span--}}
{{--                                class="badge badge-warning">{{ $admins_count }}</span></h4>--}}
{{--                        <a href="{{route('admin.users.index',['admins'])}}" class="btn btn-primary">Admins</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-2">--}}
{{--                <div class="card bg-dark">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title text-white">Customers</h4>--}}
{{--                        <h4 class="card-subtitle mb-2 text-white"><span--}}
{{--                                class="badge badge-warning">{{ $customers_count }}</span></h4>--}}
{{--                        <a href="{{route('admin.users.index',['customers'])}}" class="btn btn-primary">Customer</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
