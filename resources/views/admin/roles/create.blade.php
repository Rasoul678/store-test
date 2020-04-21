@extends('admin.app')
@section('title', 'Create Role')
@section('page-title') <i class="fa fa-user-plus"></i> Create Role @endsection
@section('content')
    <div class="container mt-2">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        @error('name')
                        <div class="alert alert-danger custom-error">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div>
            </div>
            <div class="row container">
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
                <div class="alert alert-danger custom-error">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-1">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger" role="button" href="{{ route('admin.roles.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
