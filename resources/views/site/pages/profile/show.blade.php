@extends('site.app')
@section('title') My Profile @endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 col-lg-9">
                <h4 class="m-0 mt-2">{{ $user->full_name }}</h4>
            </div>
            <div class="col-4 col-lg-3">
                <a class="btn btn-block btn-secondary" href="{{route('order.index')}}"> Orders</a>
            </div>
        </div>
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

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name"><h6>First Name</h6></label>
                    <input disabled type="text" class="form-control" id="first_name"
                           value="{{ old('first_name', $user->first_name) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name"><h6>Last Name</h6></label>
                    <input disabled type="text" class="form-control" id="last_name"
                           value="{{ old('last_name', $user->last_name) }}">
                </div>
            </div>
        </div>
        <form action="{{route('profile.edit')}}"
              method="get">@csrf
            <button class="btn btn-success" type="submit">
                Edit Profile
            </button>
        </form>
    </div>
@endsection
