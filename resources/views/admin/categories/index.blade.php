@extends('admin.app')
@section('title') Categories @endsection
@section('content')
    <div class="container mt-5">
        <h1 class="mt-5 rounded-pill bg-dark text-center p-3 text-light"> Categories</h1>
        <div class="mt-5">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-lg" role="button">Add Category</a>
        </div>
        <div class="mt-3">
            <div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><h4> #</h4></th>
                        <th scope="col"> <h4>Name</h4></th>
                        <th scope="col"> <h4>Slug</h4></th>
                        <th scope="col"> <h4>Description</h4></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td><h5>{{ $loop->iteration }}</h5></td>
                            <td>
                                <h4>
                                    <a href="{{route('admin.categories.show',['category'=>$category->slug])}}">{{ $category->name }}</a>
                                </h4>
                            </td>
                            <td><h4>{{ $category->slug }}</h4></td>
                            <td><h5>{{ $category->description }}</h5></td>
                            <td>
                                <div class="row">
                                    <div class="form-inline">
                                        <form action="{{route('admin.categories.edit', ['category'=>$category->slug])}}"
                                              method="get">@csrf
                                            <button class="btn btn-success btn-sm" type="submit"><i
                                                    class="material-icons">edit</i></button>
                                        </form>
                                        <form action="{{ route('admin.categories.delete', ['category'=>$category->slug]) }}"
                                              method="post">@method('DELETE')@csrf
                                            <button class="btn btn-warning btn-sm m-2" type="submit"><i
                                                    class="material-icons">delete</i></button>
                                        </form>
                                        <form action="{{ route('admin.categories.forceDelete', ['category'=>$category->slug]) }}"
                                              method="post">@method('DELETE')@csrf
                                            <button class="btn btn-danger btn-sm" type="submit"><i
                                                    class="material-icons">delete_forever</i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            @empty
                                <p>There are not any categories added yet!</p>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
