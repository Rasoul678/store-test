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
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save Category</button>
                <a class="btn btn-danger" role="button" href="{{ route('admin.categories.index') }}">Cancel</a>
            </div>
        </form>
    </div>


@endsection
