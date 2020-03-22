@extends('admin.app')
@section('title') Create Product @endsection
@section('content')

    <div class="container">
        <div class="mt-4">
            <h2>Create Product</h2>
        </div>
    </div>
    <div class="container mt-5">
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <h4>Product Information</h4>
            <hr>
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight') }}">
                    </div>
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                    </div>
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for="category">Parent Category</label>
                        <select class="form-control" name="categories[]" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="status" name="status">
                <label class="form-check-label" for="featured">
                    Status
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="featured" name="featured">
                <label class="form-check-label" for="featured">
                    Featured
                </label>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save Product</button>
                <a class="btn btn-danger" role="button" href="{{ route('admin.products.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
