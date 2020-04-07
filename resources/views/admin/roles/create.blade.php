@extends('admin.app')
@section('title') Create Role @endsection
@section('content')

    <div class="container w-75 mt-5">
        <div class="mt-2">
            <h2>Add New Role</h2>
        </div>
    </div>
    <div class="container mt-3 w-75">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <h4>Role</h4>
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
                <div class="col md-6">
                    <label class="form-check-label">Select Permissions: </label>
                    <div class="form-group custom-control">
                        @foreach($permissions as $permission)
                            <div class="form-check">
                                <input name="permissions[]" class="form-check-input" type="checkbox"
                                       value="{{$permission->name}}"
                                       id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{$permission->name}}&nbsp;
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('permissions')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                <a class="btn btn-danger btn-lg" role="button" href="{{ route('admin.roles.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
