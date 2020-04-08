@extends('admin.app')
@section('title') Edit City: {{$city->city}} @endsection
@section('content')

    <div class="container w-75 mt-5">
        <div class="mt-2">
            <h2>Edit City</h2>
        </div>
    </div>
    <div class="container mt-3 w-75">
        <form action="{{ route('admin.cities.update',['city'=>$city->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <h4>{{$city->city}}</h4>
            <hr>
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        @error('city')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="city"
                               value="{{ old('name', $city->city) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="state">State</label>
                        @error('state')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="state"
                               value="{{ old('name', $city->state) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="name">Country</label>
                        @error('country')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="country"
                               value="{{ old('name', $city->country) }}">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                <a class="btn btn-danger btn-lg" role="button"
                   href="{{ route('admin.cities.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
