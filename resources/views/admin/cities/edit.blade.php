@extends('admin.app')
@section('title') Edit City: {{$city->city}} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-map-marker"></i> Cities</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container">
        <h4 class="mt-2 mb-3">Edit: {{$city->city}}</h4>
        <hr>
        <form action="{{ route('admin.cities.update',['city'=>$city->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        @error('city')
                        <div class="alert alert-danger custom-error">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="city"
                               value="{{ old('name', $city->city) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="state">State</label>
                        @error('state')
                        <div class="alert alert-danger custom-error">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="state"
                               value="{{ old('name', $city->state) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Country</label>
                        @error('country')
                        <div class="alert alert-danger custom-error">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="country"
                               value="{{ old('name', $city->country) }}">
                    </div>
                </div>
            </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-danger" role="button"
                       href="{{ route('admin.cities.index') }}">Cancel</a>
                </div>
        </form>
    </div>
@endsection
