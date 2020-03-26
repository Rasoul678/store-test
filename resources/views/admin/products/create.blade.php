@extends('admin.app')
@section('title') Create Product @endsection
@section('content')

    <div class="container">
        <div class="mt-2">
            <h2>Create Product</h2>
        </div>
    </div>
    <div class="container mt-3">
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <h4>Product Information</h4>
            <hr>
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="type">Type</label>
                        @error('type')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="type" value="{{ old('type') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="price">Price</label>
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col md-6">
                    <label class="form-check-label">Select Category: </label>
                    <div class="form-group custom-control-inline">
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input name="categories[]" class="form-check-input" type="checkbox"
                                       value="{{$category->slug}}"
                                       id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{$category->name}}&nbsp;
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('categories')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save Product</button>
                <a class="btn btn-danger" role="button" href="{{ route('admin.products.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
