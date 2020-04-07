@extends('admin.app')
@section('title')
    @if(request()->has('admins'))
        Admins
    @elseif(request()->has('customers'))
        Customers
    @else
        Users
    @endif
@endsection
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
    <div class="table-responsive-xl mt-3">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"><h4 class="text-left">Name</h4></th>
                    <th scope="col"><h4 class="text-left">E-mail</h4></th>
                    <th scope="col"><h4 class="text-center">Joined at</h4></th>
                    <th scope="col"><h4 class="text-center">Role</h4></th>
                    <th scope="col"><h4 class="text-center">Actions</h4></th>

                </tr>
                </thead>
                <tbody>
                @forelse($users as $item)
                    <tr>
                        <th scope="row"><h5 class="text-left">{{$item->first_name}} {{$item->last_name}}</h5></th>
                        <td><h5 class="text-left">{{$item->email}}</h5></td>
                        <td><h6 class="text-center">{{$item->created_at->format('Y M d, h:i:s')}}</h6></td>
                        <td>
                            @forelse($item->getRoleNames() as $role)
                                @if($role == 'Admin')
                                    <h5 class="text-center"><span class="badge badge-warning">{{ $role }}</span></h5>
                                @elseif($role == 'SuperAdmin')
                                    <h5 class="text-center"><span class="badge badge-warning">{{ $role }}</span></h5>
                                @else
                                    <h5 class="text-center"><span class="badge badge-info">{{ $role }}</span></h5>
                                @endif
                            @empty
                                <h5 class="text-center">The user has not any role.</h5>
                            @endforelse
                        </td>
                        <td class="text-center">
                            <form
                                    action="{{route('admin.users.show',['user'=>$item->id])}}"
                                    method="get">@csrf
                                <button class="btn btn-info btn-sm" type="submit">
                                    <i class="material-icons">visibility</i>
                                </button>
                            </form>
                        </td>
                        @empty
                            <div class="alert alert-info">
                                <h4 class="text-center">
                                    @if(request()->has('admins'))
                                        Admin
                                    @elseif(request()->has('customers'))
                                        Customer
                                    @else
                                        User
                                    @endif
                                    list is empty, for now!
                                </h4>
                            </div>
                    </tr>
                @endforelse
                </tbody>
            </table>
        {{ $users->links()}}
    </div>
@endsection
