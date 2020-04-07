@extends('site.app')
@section('title') My Profile @endsection
@section('content')
    <div class="container mt-3">
        <h3>Basic Information</h3>
        <hr>
        <a class="btn btn-block btn-outline-dark" href="{{route('order.index')}}">My orders</a>
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

        <div class="row">
            <div class="col md-6">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input disabled type="text" class="form-control" id="first_name"
                           value="{{ old('first_name', $user->first_name) }}">
                </div>
            </div>
            <div class="col md-6">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input disabled type="text" class="form-control" id="last_name"
                           value="{{ old('last_name', $user->last_name) }}">
                </div>
            </div>
        </div>

        <div class="mt-3 form-inline">
            <form action="{{route('profile.edit')}}"
                  method="get">@csrf
                <button class="btn btn-success btn-sm" type="submit"><i
                        class="material-icons">edit</i>
                </button>
            </form>
        </div>
    </div>
@endsection
