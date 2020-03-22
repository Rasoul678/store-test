@extends('admin.app')
@section('title') Categories @endsection
@section('content')
    <div class="container mt-5">
        <div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" role="button">Add Category</a>
        </div>
        <div class="mt-5">
            <h2>Categories</h2>
            <div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> Slug </th>
                        <th class="text-center"> Parent </th>
                        <th class="text-center"> Featured </th>
                        <th class="text-center"> Menu </th>
                        <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        @if ($category->id != 1)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->parent->name }}</td>
                                <td class="text-center">
                                    @if ($category->featured == 1)
                                        <span class="badge badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-danger">No</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($category->menu == 1)
                                        <span class="badge badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-danger">No</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col s6">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning" role="button"><i class="material-icons">edit</i></a>
                                        </div>
                                        <div class="col s6">
                                            <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-danger" role="button"><i class="material-icons">delete_forever</i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
