@extends('admin.app')
@section('title') Edit Product @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Products</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container w-75">
        <h2 class="mt-2 mb-3">Edit Product</h2>
        <hr>
        <form action="{{ route('admin.products.update',['product'=>$product->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name"><h5>Name</h5></label>
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $product->name) }}" style="font-size: 20px">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="price"><h5>Price</h5></label>
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="price" name="price"
                               value="{{ old('price', $product->price) }}" style="font-size: 20px">
                    </div>
            </div>
            <div class="form-group">
                <label for="type"><h5>Type</h5></label>
                @error('type')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input type="text" class="form-control" id="name" name="type" value="{{ old('type', $product->type) }}" style="font-size: 18px">
            </div>

            <div class="row">
                <div class="col md-6">
                    <label class="form-check-label"><h5>Select Category: </h5></label>
                    <div class="form-group custom-control-inline">
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input {{in_array($category->id, $product->getCategories->pluck('id')->toArray()) ? 'checked' : ''}} name="categories[]" type="checkbox"
                                       value="{{$category->slug}}">
                                <label>
                                    <strong>{{$category->name}}</strong>
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
                <label for="description"><h5>Description</h5></label>
                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <textarea class="form-control" id="description"
                          name="description" style="font-size: 18px">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                <a class="btn btn-danger btn-lg" role="button"
                   href="{{ route('admin.products.index') }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection