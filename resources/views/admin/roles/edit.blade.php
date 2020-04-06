@extends('admin.app')
@section('title') Edit Role: {{$role->name}} @endsection
@section('content')

    <div class="container w-75 mt-5">
        <div class="mt-2">
            <h2>Edit Role</h2>
        </div>
    </div>
    <div class="container mt-3 w-75">
        <form action="{{ route('admin.roles.update',['role'=>$role->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <h4>{{$role->name}}</h4>
            <hr>
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

            <div class="row">
                <div class="col md-6">
                    <label class="form-check-label">Select Category: </label>
                    <div class="form-group custom-control">
                        @foreach($permissions as $permission)
                            <div class="form-check">
                                @php $check = $role->hasPermissionTo($permission->id) ? 'checked' : ''@endphp
                                <input {{$check}} name="permissions[]" class="form-check-input" type="checkbox"
                                       value="{{$permission->id}}"
                                       id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{$permission->name}}&nbsp&nbsp&nbsp&nbsp;
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
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                <a class="btn btn-danger btn-lg" role="button"
                   href="{{ route('admin.roles.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
