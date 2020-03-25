@extends('admin.app')
@section('title') Edit Product @endsection
@section('content')

    <div class="container">
        <div class="mt-2">
            <h2>Product: {{$product->name}}</h2>
        </div>
    </div>
    <div class="container mt-3">
        <h4>Product Information</h4>
        <hr>
        <div class="row">
            <div class="col md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input disabled type="text" class="form-control" id="name" name="name"
                           value="{{ old('name', $product->name) }}">
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

        <div class="mt-3">
            <a class="btn btn-primary" role="button"
               href="{{ route('admin.products.edit',['product'=>$product->id]) }}"><i
                    class="material-icons">edit</i></a>
            <a href="{{ route('admin.products.delete', ['product'=>$product->id]) }}"
               class="btn btn-danger"
               role="button"><i class="material-icons">delete_forever</i></a>
        </div>

        </form>
    </div>
@endsection
