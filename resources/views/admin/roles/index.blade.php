@extends('admin.app')
@section('title') Roles @endsection
@section('content')
    <div class="container-fluid mt-4">
        <h1 class="mt-2 text-center"> Roles</h1>
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('admin.roles.create')}}" class="btn btn-primary btn-lg" role="button">Add Role</a>
            </div>
        </div>
        <div class="mt-4">
            <div>
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th><h4> #</h4></th>
                        <th><h4>Name</h4></th>
                        <th class="text-center"><h4>Permissions</h4></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td><h5>{{ $loop->iteration }}</h5></td>
                            <td><h5>{{ $role->name }}</h5></td>
                            <td>
                                @foreach($role->permissions as $permission)
                                    <h5><span class="badge badge-dark">{{ $permission->name }}</span></h5>
                                @endforeach
                            </td>
                            <td>
                                <form
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
            </div>
        </div>
    </div>
@endsection
