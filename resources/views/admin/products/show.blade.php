@extends('admin.app')
@section('title') Edit Product @endsection
@section('content')

    <div class="container w-75 mt-5">
        <div class="mt-2">
            <h2>Product: {{$product->name}}</h2>
        </div>
    </div>
    <div class="container mt-3 w-75">
        <hr>
        <div class="row">
            <div class="col md-4">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input disabled type="text" class="form-control" id="name" name="name"
                           value="{{ old('name', $product->name) }}">
                </div>
            </div>
            <div class="col md-4">
                <div class="form-group">
                    <label for="type">Type</label>
                    <input disabled type="text" class="form-control" id="type" name="type"
                           value="{{ old('name', $product->type) }}">
                </div>
            </div>
            <div class="col md-4">
                <div class="form-group">
                    <label for="status">Status</label>
                    <input disabled type="text" class="form-control" id="status" name="status"
                           value="{{ old('name', $product->status->description) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col md-6">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input disabled type="text" class="form-control" id="price" name="price"
                           value="{{ old('price', $product->price) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col md-6">
                <label class="form-check-label">Category: </label>
                <div class="form-group custom-control-inline">
                    @foreach($product->getCategories as $category)
                        <span class="badge badge-primary">{{ $category->name }}</span>&nbsp;
                    @endforeach
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea disabled class="form-control" id="description"
                      name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mt-3 form-inline">
            <form action="{{ route('admin.products.edit', ['product'=>$product->id]) }}"
                  method="get">@csrf
                <button class="btn btn-success btn-sm" type="submit"><i
                        class="material-icons">edit</i>
                </button>
            </form>
            <form action="{{ route('admin.products.delete', ['product'=>$product->id]) }}"
                  method="post">@method('DELETE')@csrf
                <button class="btn btn-warning btn-sm m-2" type="submit"><i
                        class="material-icons">delete</i>
                </button>
            </form>
            <form
                action="{{ route('admin.products.forceDelete', ['product_id'=>$product->id]) }}"
                method="post">@method('DELETE')@csrf
                <button class="btn btn-danger btn-sm" type="submit"><i
                        class="material-icons">delete_forever</i>
                </button>
            </form>
        </div>
    </div>
@endsection
