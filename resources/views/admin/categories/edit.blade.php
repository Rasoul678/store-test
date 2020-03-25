@extends('admin.app')
@section('title') Edit Category @endsection
@section('content')

    <div class="container">
        <div>
            <h3 class="mt-4">Edit Category</h3>
        </div>

        <form action="{{route('admin.categories.update',['category'=>$category->slug])}}" method="post">
            @method('PATCH') @csrf
            <div class="form-group">
                <label for="name">Name</label>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name', $category->name) }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description"
                          name="description">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update Category</button>
                <a class="btn btn-danger" role="button"
                   href="{{ route('admin.categories.show', ['category'=>$category->slug]) }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
