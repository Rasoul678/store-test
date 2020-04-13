@extends('admin.app')
@section('title', 'Roles')
@section('page-title') <i class="fa fa-user-o"></i> Roles @endsection
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('admin.roles.create')}}" class="btn btn-primary btn-lg" role="button">Add Role</a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <table class="table table-hover table-sm mt-3" style="max-width: 120px">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"><h6 class="text-center m-0 p-1">Name</h6></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <th scope="row" style="height: 53px"><h6 class="text-center text-truncate m-0" style="max-width: 120px">{{ $role->name }}</h6></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="table-responsive mt-3">
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><h6 class="text-center m-0 p-1">Permissions</h6></th>
                        <th scope="col"><h6 class="text-center m-0 p-1">Actions</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td class="text-truncate" style="max-width: 200px">
                                @foreach($role->permissions as $permission)
                                    <span class="badge badge-dark text-truncate">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td class="row justify-content-center ml-1" style="min-width: 120px">
                                <form class="mr-1"
                                        action="{{ route('admin.roles.edit', ['role'=>$role->id]) }}"
                                        method="get">@csrf
                                    <button class="btn btn-info btn-sm" type="submit"><i
                                                class="material-icons">edit</i>
                                    </button>
                                </form>
                                <form
                                        action="{{ route('admin.roles.delete', ['role'=>$role->id]) }}"
                                        method="post">@method('DELETE')@csrf
                                    <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="material-icons">delete_forever</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $roles->links('pagination.default')}}
            </div>
        </div>
    </div>
@endsection
