@extends('admin.app')
@section('title'){{$user->getFullNameAttribute()}}@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-group"></i>
                @if(request()->has('admins'))
                    Admins
                @elseif(request()->has('customers'))
                    Customers
                @else
                    Users
                @endif
            </h1>
        </div>
    </div>

    <div class="container w-75">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">User: {{$user->getFullNameAttribute()}}</h2>
                <h5 class="card-subtitle mb-4 text-muted">Joined at: {{$user->created_at->format('Y M d, h:i:s')}}</h5>
                <div class="row">
                    <div class="col-12 mt-3">
                        <h4 class="d-inline text-info">Name: </h4>
                        <h5 class="d-inline">{{$user->first_name}}{{ $user->last_name }}</h5>
                    </div>
                    <div class="col-12 mt-3">
                        <h4 class="d-inline text-info">E-mail: </h4>
                        <h5 class="d-inline">{{$user->email}}</h5>
                    </div>
                    <div class="col-12 mt-3">
                        <h4 class="mt-5 text-info mt-5 d-inline">Role: </h4>
                        @forelse($user->getRoleNames() as $role)
                            @if($role == 'Admin')
                                <h5 class="mt-5 d-inline bg-warning rounded p-1">{{ $role }}</h5>&nbsp;
                            @elseif($role == 'SuperAdmin')
                                <h5 class="d-inline bg-warning rounded p-1">{{ $role }}</h5>
                            @else
                                <h5 class="d-inline bg-info rounded p-1">{{ $role }}</h5>&nbsp;
                            @endif

                        @empty
                            <h5 class="mt-5">No role has been assigned yet!</h5>
                        @endforelse
                    </div>
                </div>
                <div class="mt-5">
                    @can('edit user')
                    <a class="btn btn-primary" role="button"
                       href="{{route('admin.users.edit',['user'=>$user->id])}}">
                        <i class="material-icons">edit</i>
                    </a>
                    @endcan
                    <a class="btn btn-danger" role="button"
                       href="{{ route('admin.users.index') }}"><i class="material-icons">arrow_back</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
