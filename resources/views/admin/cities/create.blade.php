@extends('admin.app')
@section('title') Add City @endsection
@section('content')

    <div class="container w-75 mt-5">
        <div class="mt-2">
            <h2>Add New City</h2>
        </div>
    </div>
    <div class="container mt-3 w-75">
        <form action="{{ route('admin.cities.store') }}" method="POST">
            @csrf
            <h4>City</h4>
            <hr>
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        @error('city')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="city" value="{{ old('city') }}">
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
                        <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="country">Country</label>
                        @error('country')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="country" value="{{ old('country') }}">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                <a class="btn btn-danger btn-lg" role="button" href="{{ route('admin.cities.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
