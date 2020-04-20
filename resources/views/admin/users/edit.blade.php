@extends('admin.app')
@section('title', 'User: ' . $user->getFullNameAttribute())
@section('page-title') <i class="fa fa-group"></i> User: {{$user->getFullNameAttribute()}} @endsection
@section('content')
    <div class="container">
        <form action="{{ route('admin.users.update',['user'=>$user->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="email"><h6>Email</h6></label>
                        <input disabled type="text" class="form-control" id="email"
                               value="{{ old('name', $user->email) }}" style="font-size: 16px">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="joined_at"><h6>Joined at</h6></label>
                        <input disabled type="text" class="form-control" id="joined_at"
                               value="{{ old('name', $user->created_at->format('Y M d, h:i:s')) }}" style="font-size: 16px">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="first_name"><h6>First Name</h6></label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{ old('first_name', $user->first_name) }}" style="font-size: 16px">
                    </div>
                    @error('first_name')
                    <div class="alert alert-danger custom-error">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="last_name"><h6>Last Name</h6></label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{ old('last_name', $user->last_name) }}" style="font-size: 16px">
                    </div>
                    @error('last_name')
                    <div class="alert alert-danger custom-error">{{$message}}</div>
                    @enderror
                </div>
            </div>

            @can('add admin')
            <div class="row">
                <div class="col12 col-md-6">
                    <label class="form-check-label"><h6>Role: </h6></label>
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
                                        <h6 class="d-inline mr-3">{{$item->name}}</h6>
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
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-danger" role="button"
                   href="{{ route('admin.users.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
