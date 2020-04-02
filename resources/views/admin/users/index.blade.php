@extends('admin.app')
@section('title')
    @if(request()->has('admins'))
        Admin
    @elseif(request()->has('customers'))
        Customer
    @else
        User
    @endif
    List
@endsection
@section('content')
    <div class="container mt-2">
        <div class="mt-3">
            <h2 class="mt-3 rounded-pill bg-dark text-center p-3 text-light">
                @if(request()->has('admins'))
                    Admin
                @elseif(request()->has('customers'))
                    Customer
                @else
                    User
                @endif
                List
            </h2>
            <div class="mt-3">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th><h4>Email</h4></th>
                        <th><h4>First Name</h4></th>
                        <th><h4>Last Name</h4></th>
                        <th><h4>Joined at</h4></th>
                        <th><h4>Role</h4></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $item)
                        <tr>
                            <td><a href="{{route('admin.users.show',['user'=>$item->id])}}">{{$item->email}}</a></td>
                            <td>{{$item->first_name}}</td>
                            <td>{{$item->last_name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                @forelse($item->getRoleNames() as $role)
                                    <h5><span class="badge badge-dark">{{ $role }}</span></h5>
                                @empty
                                    <h5>The user has not any role.</h5>
                                @endforelse
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
            </div>
            {{ $users->links()}}
        </div>
    </div>
@endsection
