@extends('admin.app')
@section('title', 'City: ' . $city->city)
@section('page-title') <i class="fa fa-map-marker"></i> City: {{$city->city}} @endsection
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">City Details</h4>
                <div class="row">
                    <div class="col-12 col-lg-4 mt-3">
                        <h6 class="d-inline">Name:</h6>
                        <h6 class="d-inline">{{$city->city}}</h6>
                    </div>
                    <div class="col-12 col-lg-4 mt-3">
                        <h6 class="d-inline">State:</h6>
                        <h6 class="d-inline">{{$city->state}}</h6>
                    </div>
                    <div class="col-12 col-lg-4 mt-3">
                        <h6 class="d-inline">Country:</h6>
                        <h6 class="d-inline">{{$city->country}}</h6>
                    </div>
                </div>
                <hr>
                <a class="btn btn-primary btn-block d-md-inline mr-md-1" role="button"
                   href="{{ route('admin.cities.edit', ['city'=>$city->id]) }}">
                    Edit
                </a>
                <a class="btn btn-danger btn-block d-md-inline" role="button"
                   href="{{ route('admin.cities.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection
