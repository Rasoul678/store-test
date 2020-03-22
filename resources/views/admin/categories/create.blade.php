@extends('admin.app')
@section('title') Create Category @endsection
@section('content')

    <div class="container">
        <div class="mt-4">
            <h2>Add New Category</h2>
        </div>
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="category">Parent Category</label>
                <select class="form-control" name="parent_id" id="category">
                    <option value="" disabled selected>Select a parent category</option>
                    @foreach($categories as $key => $category)
                        <option value="{{ $key }}"> {{ $category }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" checked="checked" value="" id="featured" name="featured">
                <label class="form-check-label" for="featured">
                    Featured Category
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" checked="checked" value="" id="menu" name="menu">
                <label class="form-check-label" for="menu">
                    Show in Menu
                </label>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save Category</button>
                <a class="btn btn-danger" role="button" href="{{ route('admin.categories.index') }}">Cancel</a>
            </div>
        </form>
    </div>


@endsection
