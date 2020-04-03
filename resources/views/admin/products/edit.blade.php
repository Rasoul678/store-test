@extends('admin.app')
@section('title') Edit Product @endsection
@section('content')

    <div class="container w-75 mt-5">
        <div class="mt-2">
            <h2>Edit Product</h2>
        </div>
    </div>
    <div class="container mt-3 w-75">
        <form action="{{ route('admin.products.update',['product'=>$product->id]) }}" method="POST">
            @method('PATCH')
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
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $product->name) }}">
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
                        <input type="text" class="form-control" id="price" name="price"
                               value="{{ old('price', $product->price) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col md-6">
                    <label class="form-check-label">Select Category: </label>
                    <div class="form-group custom-control-inline">
                        @foreach($categories as $category)
                            <div class="form-check">
                                @php $check = in_array($category->id, $product->getCategories->pluck('id')->toArray()) ? 'checked' : ''@endphp
                                <input {{$check}} name="categories[]" class="form-check-input" type="checkbox"
                                       value="{{$category->slug}}"
                                       id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{$category->name}}&nbsp&nbsp&nbsp&nbsp;
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
                <textarea class="form-control" id="description"
                          name="description">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                <a class="btn btn-danger btn-lg" role="button"
                   href="{{ route('admin.products.show',['product'=>$product->id]) }}">Cancel</a>
            </div>

        </form>
    </div>
@endsection
