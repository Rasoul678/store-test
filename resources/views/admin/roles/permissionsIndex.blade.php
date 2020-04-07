@extends('admin.app')
@section('title') Roles @endsection
@section('content')
    <div class="container-fluid mt-4">
        <h1 class="mt-2 text-center"> Permissions</h1>
        <div class="mt-4">
            <div>
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th><h4> #</h4></th>
                        <th><h4>Name</h4></th>
                        <th class="text-center"><h4>Roles</h4></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td><h5>{{ $loop->iteration }}</h5></td>
                            <td><h5>{{ $permission->name }}</h5></td>
                            <td>
                                @foreach($permission->roles as $role)
                                    <h5><span class="badge badge-dark">{{ $role->name }}</span></h5>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
