@extends('admin.app')
@section('title') Edit Category @endsection
@section('content')

    <div class="container">
        <div>
            <h3 class="mt-4">Edit Category</h3>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" disabled class="form-control" id="name" name="name"
                   value="{{ old('name', $category->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" disabled id="description"
                      name="description">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="mt-3">
            <a class="btn btn-primary" role="button"
               href="{{ route('admin.categories.edit', ['category'=>$category->slug]) }}"><i
                    class="material-icons">edit</i></a>
            <a class="btn btn-danger" role="button"
               href="{{ route('admin.categories.delete', ['category'=>$category->slug]) }}"><i class="material-icons">delete_forever</i></a>
        </div>
    </div>
@endsection
