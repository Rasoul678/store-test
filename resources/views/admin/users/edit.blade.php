@extends('admin.app')
@section('title'){{$user->getFullNameAttribute()}}@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-group"></i> Users</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container">
            <h2>
                User: {{$user->getFullNameAttribute()}}
            </h2>
        <hr>
        <form action="{{ route('admin.users.update',['user'=>$user->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="email"><h4>Email</h4></label>
                        <input disabled type="text" class="form-control" id="email"
                               value="{{ old('name', $user->email) }}" style="font-size: 20px">
                    </div>
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="joined_at"><h4>Joined at</h4></label>
                        <input disabled type="text" class="form-control" id="joined_at"
                               value="{{ old('name', $user->created_at->format('Y M d, h:i:s')) }}" style="font-size: 20px">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="first_name"><h4>First Name</h4></label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{ old('first_name', $user->first_name) }}" style="font-size: 20px">
                    </div>
                    @error('first_name')
                    <div class="alert alert-danger custom-error">{{$message}}</div>
                    @enderror
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="last_name"><h4>Last Name</h4></label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{ old('last_name', $user->last_name) }}" style="font-size: 20px">
                    </div>
                    @error('last_name')
                    <div class="alert alert-danger custom-error">{{$message}}</div>
                    @enderror
                </div>
            </div>

            @can('add admin')
            <div class="row">
                <div class="col md-6">
                    <label class="form-check-label"><h4>Role: </h4></label>
                    <div class="form-group custom-control-inline">
                        @foreach($role as $item)
                            @if($item->name == 'SuperAdmin')
                                @continue
                            @else
                                <div class="form-check">
                                    @php $check = in_array($item->name, $user->getRoleNames()->toArray()) ? 'checked' : ''@endphp
                                    <input {{$check}} name="role" class="form-check-input" type="radio"
                                           value="{{$item->name}}"
                                           id="role">
                                    <label class="form-check-label" for="role">
                                        <h5 class="d-inline mr-3">{{$item->name}}</h5>
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @error('role')
                    <div class="alert alert-danger custom-error">{{$message}}</div>
                    @enderror
                </div>
            </div>
            @endcan

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                <a class="btn btn-danger btn-lg" role="button"
                   href="{{ route('admin.users.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
