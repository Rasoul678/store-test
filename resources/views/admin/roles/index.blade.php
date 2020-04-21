@extends('admin.app')
@section('title', 'Roles')
@section('page-title') <i class="fa fa-user-o"></i> Roles @endsection
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('admin.roles.create')}}" class="btn btn-info" role="button" title="Add New Role">Add Role</a>
            </div>
        </div>
        <div class="table-responsive-lg mt-3" style="min-height: 370px">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col" style="min-width: 320px">Permissions</th>
                    <th class="text-center" scope="col" style="min-width: 120px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <th scope="row" class="text-truncate">{{ $role->name }}</th>
                        <th scope="row">
                            @foreach($role->permissions as $permission)
                                <span class="badge badge-dark" style="font-size: 12px">{{ $permission->name }}</span>
                            @endforeach
                        </th>
                        <td class="row justify-content-center">
                            <form class="mr-1"
                                  action="{{ route('admin.roles.edit', ['role'=>$role->id]) }}"
                                  method="get">@csrf
                                <button class="btn btn-primary btn-sm" type="submit" title="Edit Role">
                                        Edit
                                </button>
                            </form>
                            <form
                                    action="{{ route('admin.roles.delete', ['role'=>$role->id]) }}"
                                    method="post">@method('DELETE')@csrf
                                <button class="btn btn-danger btn-sm" type="submit" title="Delete Role">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $roles->links()}}
    </div>
@endsection
