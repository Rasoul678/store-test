@extends('admin.app')
@section('title', 'Categories')
@section('page-title') <i class="fa fa-tags"></i> Categories @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="mt-1 col-xs-12 col-sm-4 col-md-5 col-lg-3 col-xl-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-info btn-block" role="button" title="Add new Category">Add
                    Category</a>
            </div>
            <div class="mt-1 col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2">
                <a href="{{ route('admin.categories.index',['only_trash']) }}" class="btn btn-warning btn-block" role="button" title="See Trash Items">Trash</a>
            </div>
        </div>

{{-- Table --}}
        <div class="table-responsive-lg mt-3" style="min-height: 360px">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Parent</th>
                    <th scope="col" style="min-width: 120px">Description</th>
                    <th scope="col">Slug</th>
                    <th class="text-center" scope="col" style="min-width: 120px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <th scope="row" class="text-truncate">{{ $category->name }}</th>
                        <th scope="row">{{ $category->parent->name }}</th>
                        <th scope="row" class="text-truncate" style="max-width: 350px">{{ $category->description }}</th>
                        <th scope="row">{{ $category->slug }}</th>
                        <td>
                            <div class="d-flex justify-content-center mr-0">
                                @if(!$category->deleted_at)
                                    <div class="col-xs-3 mr-1 mb-1">
                                        <form
                                                action="{{route('admin.categories.show',['category'=>$category->slug])}}"
                                                method="get">@csrf
                                            <button class="btn btn-primary btn-sm py-0" type="submit" title="View Details">
                                                Details
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-xs-3 mr-1 mb-1">
                                        <form
                                                action="{{route('admin.categories.edit', ['category'=>$category->slug])}}"
                                                method="get">@csrf
                                            <input type="hidden" name="id" value="{{ $category->id  }}">
                                            <button class="btn btn-secondary btn-sm py-0" type="submit" title="Edit Category">
                                                Edit
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-xs-3 mr-1">
                                        <form
                                                action="{{ route('admin.categories.delete', ['category'=>$category->slug]) }}"
                                                method="post">@method('DELETE')@csrf
                                            <button class="btn btn-warning btn-sm py-0" type="submit" title="Put in Trash">
                                                Trash
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="col-xs-3 mr-1">
                                        <form
                                                action="{{ route('admin.categories.restore', ['category_slug'=>$category->slug]) }}"
                                                method="post">@csrf
                                            <button class="btn btn-primary btn-sm py-0" type="submit" title="Restore Category">
                                                Restore
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                <div class="col-xs-3 mr-1">
                                    <form
                                            action="{{ route('admin.categories.forceDelete', ['category_slug'=>$category->slug]) }}"
                                            method="post">@method('DELETE')@csrf
                                        <button class="btn btn-danger btn-sm py-0" type="submit" title="Delete Forever">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
{{-- End of Table--}}
        {{ $categories->links()}}
    </div>
@endsection
