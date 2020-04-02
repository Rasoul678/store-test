@extends('admin.app')
@section('title'){{$user->getFullNameAttribute()}}@endsection
@section('content')

    <div class="container">
        <div class="mt-2">
            <h2>{{$user->getFullNameAttribute()}}</h2>
        </div>
    </div>
    <div class="container mt-3">
        <h4>User Information</h4>
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
                           value="{{ old('name', $user->created_at->format('Y m d')) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col md-6">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input disabled type="text" class="form-control" id="first_name"
                           value="{{ old('price', $user->first_name) }}">
                </div>
            </div>
            <div class="col md-6">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input disabled type="text" class="form-control" id="last_name"
                           value="{{ old('price', $user->last_name) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col md-6">
                <label class="form-check-label">Role: </label>
                <div class="form-group custom-control-inline">
                    @forelse($user->getRoleNames() as $role)
                        <span class="badge badge-primary">{{ $role }}</span>&nbsp;
                    @empty
                        <small>No role has been assigned yet!</small>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="mt-3 form-inline">
            <form action="{{route('admin.users.edit',['user'=>$user->id])}}"
                  method="get">@csrf
                <button class="btn btn-success btn-sm" type="submit"><i
                        class="material-icons">edit</i>
                </button>
            </form>
        </div>
    </div>
@endsection
