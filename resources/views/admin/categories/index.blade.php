@extends('admin.app')
@section('title', 'Categories')
@section('page-title') <i class="fa fa-tags"></i> Categories @endsection
@section('content')
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
        <div class="d-flex justify-content-center mb-2 mb-sm-0" style="min-height: 383px">
            <table class="table table-hover table-sm mt-3" style="max-width: 120px">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"><h6 class="text-center m-0 mr-lg-5 ml-lg-5 p-1">Name</h6></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    @if ($category->id != 1)
                        <tr>
                            <th scope="row" style="height: 53px"><h6 class="text-center text-truncate m-0" style="max-width: 120px">{{ $category->name }}</h6></th>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <div class="table-responsive mt-3">
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><h6 class="text-center m-0 mr-lg-3 ml-lg-3  p-1">Parent</h6></th>
                        <th scope="col"><h6 class="text-center m-0 mr-lg-3 ml-lg-3  p-1">Slug</h6></th>
                        <th scope="col"><h6 class="text-center  m-0 mr-lg-5 ml-lg-5  p-1">Description</h6></th>
                        <th scope="col"><h6 class="text-center m-0 mr-lg-5 ml-lg-5  p-1">Actions</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        @if ($category->id != 1)
                            <tr>
                                <td><h6 class="text-center">{{ $category->parent->name }}</h6></td>
                                <td><h6 class="text-center">{{ $category->slug }}</h6></td>
                                <td><h6 class="pr-2 pl-2 text-truncate" style="max-width: 250px;">{{ $category->description }}</h6></td>
                                <td>
                                    <div class="d-flex justify-content-center mr-0">
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
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $categories->links('pagination.default')}}
    </div>
@endsection
