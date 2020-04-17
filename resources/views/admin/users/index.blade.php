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

    <div class="table-responsive-lg" style="min-height: 410px">
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col" style="min-width: 120px">Joined</th>
                <th scope="col">Role</th>
                <th class="text-center" scope="col" style="min-width: 120px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th scope="row" class="text-truncate">{{$item->first_name}} {{$item->last_name}}</th>
                    <th scope="row">{{$item->email}}</th>
                    <th scope="row">{{$item->created_at->format('d M Y')}}</th>
                    <td>
                        @forelse($item->getRoleNames() as $role)
                            @if($role == 'Admin')
                                <span class="badge badge-warning">{{ $role }}</span>
                            @elseif($role == 'SuperAdmin')
                                <span class="badge badge-warning">{{ $role }}</span>
                            @else
                                <span class="badge badge-info">{{ $role }}</span>
                            @endif
                        @empty
                            <h5 class="text-center">no role!</h5>
                        @endforelse
                    </td>
                    <td class="row justify-content-center">
                        <form class="mr-1"
                              action="{{route('admin.users.show',['user'=>$item->id])}}"
                              method="get">@csrf
                            <button class="btn btn-primary btn-sm py-0" type="submit">
                                Details
                            </button>
                        </form>
                        <form
                                action="{{route('admin.users.carts',['user'=>$item->id])}}"
                                method="get">@csrf
                            <button class="btn btn-secondary btn-sm py-0" type="submit">
                                Cart
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links()}}

@endsection
