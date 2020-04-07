@extends('admin.app')
@section('title') Edit Category @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Categories</h1>
        </div>
    </div>
    <div class="container w-75">
        <h2 class="mt-2 mb-3">Edit Category</h2>
        <hr>
        <form action="{{route('admin.categories.update',['category'=>$category->slug])}}" method="post">
            @method('PATCH') @csrf
            <div class="form-group">
                <label for="name"><h4>Name</h4></label>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name', $category->name) }}" style="font-size: 20px">
            </div>

            <div class="form-group">
                <label for="description"><h4>Description</h4></label>
                <textarea class="form-control" id="description"
                          name="description" rows="6" style="font-size: 18px">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                <a class="btn btn-danger btn-lg" role="button"
                   href="{{ route('admin.categories.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
