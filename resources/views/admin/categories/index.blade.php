@extends('admin.app')
@section('title') Categories @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Categories</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="mt-1 col-xs-12 col-sm-4 col-md-5 col-lg-3 col-xl-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-lg btn-block" role="button">Add
                    Category</a>
            </div>
            <div class="mt-1 col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2">
                <a href="{{ route('admin.categories.index',['only_trash']) }}" class="btn btn-warning btn-lg btn-block" role="button">Trash</a>
            </div>
        </div>
        <div class="table-responsive-xl mt-3">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"><h4 class="text-center">Parent</h4></th>
                    <th scope="col"><h4 class="text-center">Name</h4></th>
                    <th scope="col"><h4 class="text-center">Slug</h4></th>
                    <th scope="col"><h4 class="text-center">Description</h4></th>
                    <th scope="col"><h4 class="text-center">Actions</h4></th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    @if ($category->id != 1)
                        <tr>
                            <th scope="row"><h5 class="text-center">{{ $loop->iteration }}</h5></th>
                            <td><h4 class="text-center">{{ $category->parent->name }}</h4></td>
                            <td><h4 class="text-center">{{ $category->name }}</h4></td>
                            <td><h4 class="text-center">{{ $category->slug }}</h4></td>
                            <td><h5 class="pr-2 pl-2 text-truncate" style="max-width: 550px;">{{ $category->description }}</h5></td>
                            <td>
                                <div class="row justify-content-center">
                                    @if(!$category->deleted_at)
                                        <div class="col-xs-3 mr-1 mb-1">
                                            <form
                                                    action="{{route('admin.categories.show',['category'=>$category->slug])}}"
                                                    method="get">@csrf
                                                <button class="btn btn-info btn-sm" type="submit">
                                                    <i class="material-icons">visibility</i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-xs-3 mr-1 mb-1">
                                            <form
                                                    action="{{route('admin.categories.edit', ['category'=>$category->slug])}}"
                                                    method="get">@csrf
                                                <input type="hidden" name="id" value="{{ $category->id  }}">
                                                <button class="btn btn-success btn-sm"  type="submit">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-xs-3 mr-1">
                                            <form
                                                    action="{{ route('admin.categories.delete', ['category'=>$category->slug]) }}"
                                                    method="post">@method('DELETE')@csrf
                                                <button class="btn btn-warning btn-sm" type="submit">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="col-xs-3 mr-1">
                                            <form
                                                    action="{{ route('admin.categories.restore', ['category_slug'=>$category->slug]) }}"
                                                    method="post">@csrf
                                                <button class="btn btn-primary btn-sm" type="submit"><i
                                                            class="material-icons">restore</i></button>
                                            </form>
                                        </div>
                                    @endif
                                    <div class="col-xs-3 mr-1">
                                        <form
                                                action="{{ route('admin.categories.forceDelete', ['category_slug'=>$category->slug]) }}"
                                                method="post">@method('DELETE')@csrf
                                            <button class="btn btn-danger btn-sm" type="submit"><i
                                                        class="material-icons">delete_forever</i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                    @endif
                        @empty
                            <div class="alert alert-info text-center" role="alert">
                                <h4>Empty!</h4>
                            </div>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $categories->links()}}
    </div>
@endsection
