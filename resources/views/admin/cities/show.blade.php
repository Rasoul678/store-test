@extends('admin.app')
@section('title') Edit City @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-map-marker"></i> City: {{$city->city}}</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container w-75 mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">City Details</h2>
                <div class="row">
                    <div class="col-12">
                        <h4 class="d-inline text-info">Name:</h4>
                        <h5 class="d-inline">{{$city->city}}</h5>
                    </div>
                    <div class="col-12 mt-3">
                        <h4 class="d-inline text-info">State:</h4>
                        <h5 class="d-inline">{{$city->state}}</h5>
                    </div>
                    <div class="col-12 mt-3">
                        <h4 class="d-inline text-info">Country:</h4>
                        <h5 class="d-inline">{{$city->country}}</h5>
                    </div>
                </div>
                <hr>
                <a class="btn btn-primary" role="button"
                   href="{{ route('admin.cities.edit', ['city'=>$city->id]) }}"><i
                            class="material-icons">edit</i></a>
                <a class="btn btn-danger" role="button"
                   href="{{ route('admin.cities.index') }}"><i class="material-icons">arrow_back</i></a>
            </div>
        </div>
    </div>
@endsection
