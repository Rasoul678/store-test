@extends('admin.app')
@section('title', 'Permissions')
@section('page-title') <i class="fa fa-key"></i> Permissions @endsection
@section('content')
    <div class="container-fluid">
        <div class="mt-4 m-auto" style="max-width: 700px">
            <table class="table table-hover table-sm" style="min-height: 417px">
                <thead class="thead-dark">
                <tr>
                    <th ><h6 class="text-center m-0 p-1">Name</h6></th>
                    <th ><h6 class="text-center m-0 p-1">Roles</h6></th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td class="text-center text-truncate"><h5 class="text-left">{{ $permission->name }}</h5></td>
                        <td class="text-center">
                            @foreach($permission->roles as $role)
                                <h5><span class="badge badge-dark">{{ $role->name }}</span></h5>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $permissions->links('pagination.default')}}
        </div>
    </div>
@endsection
