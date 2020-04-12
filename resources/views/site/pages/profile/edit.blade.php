@extends('site.app')
@section('title') My Profile @endsection
@section('content')
    <div class="container mt-5">
        <h4 class="m-0 mt-2">{{ $user->full_name }}</h4>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email"><h6>Email</h6></label>
                    <input disabled type="text" class="form-control" id="email"
                           value="{{ old('name', $user->email) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email"><h6>Joined</h6></label>
                    <input disabled type="text" class="form-control" id="email"
                           value="{{ old('name', $user->created_at->diffForHumans()) }}">
                </div>
            </div>
        </div>

        <form action="{{ route('profile.update') }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name"><h6>First Name</h6></label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{ old('price', $user->first_name) }}">
                    </div>
                    @error('first_name')
                    <div class="alert alert-danger custom-error">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name"><h6>Last Name</h6></label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{ old('price', $user->last_name) }}">
                    </div>
                    @error('last_name')
                    <div class="alert alert-danger custom-error">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-danger" role="button" href="{{ route('profile.show') }}">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
