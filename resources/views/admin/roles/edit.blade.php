@extends('admin.app')
@section('title', 'Edit Role: ' . $role->name)
@section('page-title') <i class="fa fa-user-plus"></i> Edit Role: {{$role->name}} @endsection
@section('content')
    <div class="container mt-2">
        <form action="{{ route('admin.roles.update',['role'=>$role->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $role->name) }}">
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
                                    @php $check = $role->hasPermissionTo($permission->id) ? 'checked' : ''@endphp
                                    <input {{$check}} name="permissions[]" class="form-check-input" type="checkbox"
                                           value="{{$permission->id}}"
                                           id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{$permission->name}}
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
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-danger" role="button"
                   href="{{ route('admin.roles.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
