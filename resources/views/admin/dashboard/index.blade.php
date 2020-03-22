@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="container">
        <h1 class="mt-5"> Dashboard</h1>
        <div class="row">
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h5 class="card-title text-white">Users</h5>
                        <h6 class="card-subtitle mb-2 text-white">35</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h5 class="card-title text-white">Likes</h5>
                        <h6 class="card-subtitle mb-2 text-white">1000</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h5 class="card-title text-white">Products</h5>
                        <h6 class="card-subtitle mb-2 text-white">5000</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
