@extends('admin.app')
@section('title') Create Role @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user-plus"></i> Roles</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container mt-2">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <h4>Add New Role</h4>
            <hr>
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="form-check-label">Select Permissions: </label>
                <div class="form-group custom-control">
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-6 col-md-4 col-lg-3 p-0">
                                <div class="form-check">
                                    <input name="permissions[]" class="form-check-input" type="checkbox"
                                           value="{{$permission->name}}"
                                           id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{$permission->name}}&nbsp;
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @error('permissions')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-1">
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                <a class="btn btn-danger btn-lg" role="button" href="{{ route('admin.roles.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
