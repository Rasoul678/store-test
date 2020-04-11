@extends('admin.app')
@section('title') Edit Product @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Products</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container">
        <div class="mb-3">
            <h4>Edit Product</h4>
        </div>
        <hr>
        <form action="{{ route('admin.products.update',['product'=>$product->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><h6>Name</h6></label>
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $product->name) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type"><h6>Type</h6></label>
                        @error('type')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="type" value="{{ old('type', $product->type) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price"><h6>Price</h6></label>
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="price" name="price"
                               value="{{ old('price', $product->price) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status"><h6>Status</h6></label>
                        <select class="custom-select" id="status" name="status">
                            @foreach($status as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col md-6">
                    <label class="form-check-label"><h6>Select Category: </h6></label>
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

{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <label for="image_url" class="form-check-label"><h6>Image URL</h6></label>--}}
{{--                    @error('image_url')--}}
{{--                    <div class="alert alert-danger">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                    <input type="text" class="form-control" id="image_url" name="image_url"--}}
{{--                           value="{{ old('image_url',(count($product->getMedia('image'))>0) ? $product->getMedia('image')[0]->getFullUrl() :'') }}"--}}
{{--                           style="font-size: 18px">--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="form-group">
                <label for="description"><h6>Description</h6></label>
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
