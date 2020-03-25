@extends('admin.app')
@section('title') Categories @endsection
@section('content')
    <div class="container mt-2">
        <div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" role="button">Add Category</a>
        </div>
        <div class="mt-3">
            <h2>Categories</h2>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th> Name</th>
                        <th> Slug</th>
                        <th> Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{route('admin.categories.show',['category'=>$category->slug])}}">{{ $category->name }}</a>
                            </td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <div class="row">
                                    <div class="form-inline">
                                        <form action="{{route('admin.categories.edit', ['category'=>$category->slug])}}"
                                              method="get">@csrf
                                            <button class="btn btn-warning" type="submit"><i
                                                    class="material-icons">edit</i></button>
                                        </form>
                                        <form action="{{ route('admin.categories.delete', ['category'=>$category->slug]) }}"
                                              method="post">@method('DELETE')@csrf
                                            <button class="btn btn-danger" type="submit"><i
                                                    class="material-icons">delete</i></button>
                                        </form>
                                        <form action="{{ route('admin.categories.forceDelete', ['category'=>$category->slug]) }}"
                                              method="post">@method('DELETE')@csrf
                                            <button class="btn btn-danger" type="submit"><i
                                                    class="material-icons">delete_forever</i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
