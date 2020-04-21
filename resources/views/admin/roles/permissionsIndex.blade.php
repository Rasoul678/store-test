@extends('admin.app')
@section('title', 'Permissions')
@section('page-title') <i class="fa fa-key"></i> Permissions @endsection
@section('content')
<div class="container">
    <div class="table-responsive-lg mt-3" style="min-height: 370px">
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Permissions</th>
                <th scope="col">Roles</th>

            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th scope="row" class="text-truncate">{{ $permission->name }}</th>
                    <th scope="row">
                        @foreach($permission->roles as $role)
                            <span class="badge badge-dark" style="font-size: 12px">{{ $role->name }}</span>
                        @endforeach
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $permissions->links()}}
</div>

@endsection
