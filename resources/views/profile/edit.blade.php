@extends('layout.mainlayout')
@section('title') My Profile @endsection
@section('content')
    <div class="container mt-3">
        <h3>Basic Information</h3>
        <hr>
        <div class="row">
            <div class="col md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input disabled type="text" class="form-control" id="email"
                           value="{{ old('name', $user->email) }}">
                </div>
            </div>
            <div class="col md-6">
                <div class="form-group">
                    <label for="email">Joined at</label>
                    <input disabled type="text" class="form-control" id="email"
                           value="{{ old('name', $user->created_at->diffForHumans()) }}">
                </div>
            </div>
        </div>

        <form action="{{ route('profile.update') }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{ old('price', $user->first_name) }}">
                    </div>
                    @error('first_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{ old('price', $user->last_name) }}">
                    </div>
                    @error('last_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                <a class="btn btn-danger btn-lg" role="button"
                   href="{{ route('profile.show') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
