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
@section('page-title')
    <i class="fa fa-group"></i>
    @if(request()->has('admins'))
        Admins
    @elseif(request()->has('customers'))
        Customers
    @else
        Users
    @endif
@endsection
@section('content')
    <div class="d-flex justify-content-center" style="min-height: 400px">
        <table class="table table-hover table-sm mt-3" style="max-width: 120px">
            <thead class="thead-dark">
            <tr>
                <th scope="col"><h6 class="text-center m-0 p-1">Name</h6></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
            <tr>
                <th scope="row" style="height: 53px"><h6 class="text-center text-truncate m-0" style="max-width: 120px">{{$item->first_name}} {{$item->last_name}}</h6></th>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="table-responsive mt-3">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"><h6 class="text-center m-0 p-1">Email</h6></th>
                    <th scope="col"><h6 class="text-center m-0 p-1">Joined</h6></th>
                    <th scope="col"><h6 class="text-center m-0 p-1">Role</h6></th>
                    <th scope="col"><h6 class="text-center m-0 p-1">Actions</h6></th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    <tr>
                        <td><h6 class="text-center">{{$item->email}}</h6></td>
                        <td ><h6 class="text-center" style="min-width: 150px">{{$item->created_at->format('Y M d, h:i:s')}}</h6></td>
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
                        <td class="row justify-content-center ml-1" style="min-width: 120px">
                            <form class="mr-1"
                                  action="{{route('admin.users.show',['user'=>$item->id])}}"
                                  method="get">@csrf
                                <button class="btn btn-info btn-sm" type="submit">
                                    <i class="material-icons">visibility</i>
                                </button>
                            </form>
                            <form
                                    action="{{route('admin.users.carts',['user'=>$item->id])}}"
                                    method="get">@csrf
                                <button class="btn btn-primary btn-sm" type="submit">
                                    <i class="material-icons">shopping_basket</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $users->links('pagination.default')}}

@endsection
