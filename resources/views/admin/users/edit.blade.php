@extends('admin.app')
@section('title'){{$user->getFullNameAttribute()}}@endsection
@section('content')

    <div class="container w-50 mt-5">
        <div class="mt-2">
            <h2>
                User: {{$user->getFullNameAttribute()}}
            </h2>
        </div>
    </div>
    <div class="container mt-3 w-50">
        <form action="{{ route('admin.users.update',['user'=>$user->id]) }}" method="POST">
            @method('PATCH')
            @csrf
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
                        <label for="joined_at">Joined at</label>
                        <input disabled type="text" class="form-control" id="joined_at"
                               value="{{ old('name', $user->created_at->format('Y m d')) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{ old('first_name', $user->first_name) }}">
                    </div>
                    @error('first_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{ old('last_name', $user->last_name) }}">
                    </div>
                    @error('last_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>

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
                                               id="roles">
                                        <label class="form-check-label" for="roles">
                                            {{$item->name}}&nbsp&nbsp&nbsp&nbsp;
                                        </label>
                                    </div>
                                @endif
                        @endforeach
                    </div>
                    @error('role')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                <a class="btn btn-danger btn-lg" role="button"
                   href="{{ route('admin.users.show', ['user'=>$user->id]) }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
