@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="container-fluid mt-4">
        <h1 class="mt-2 text-center"> Dashboard</h1>
        <div class="row mt-5">
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Products</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">{{ $products_count }}</span></h4>
                        <a href="{{route('admin.products.index')}}" class="btn btn-primary">Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Categories</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">{{ $categories_count }}</span></h4>
                        <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Categories</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Orders</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">{{ $orders_count }}</span></h4>
                        <a href="{{route('admin.orders.index')}}" class="btn btn-primary">Orders</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Admins</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span
                                class="badge badge-warning">{{ $admins_count }}</span></h4>
                        <a href="{{route('admin.users.index',['admins'])}}" class="btn btn-primary">Admins</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Customers</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span
                                class="badge badge-warning">{{ $customers_count }}</span></h4>
                        <a href="{{route('admin.users.index',['customers'])}}" class="btn btn-primary">Customer</a>
                    </div>
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
