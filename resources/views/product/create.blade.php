@extends('welcome')
@section('title','Create Product')
@section('content')
    <div class="container">
        <h1>Create Product</h1>
        <form action="{{route('products.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input name="name" type="text" class="form-control" placeholder="Product name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                @error('price')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input name="price" type="number" step="0.01" min="0" class="form-control" placeholder="Product price"
                       value="{{old('price')}}">
            </div>
            <div class="form-group">
                <label for="type">Product type</label>
                @error('type')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input name="type" type="text" class="form-control" placeholder="Product type" value="{{old('type')}}">
            </div>
            <label>Select category</label>
            @foreach($categories as $category)
                <div class="form-check">
                    <input name="category" class="form-check-input" type="checkbox" value="{{$category->slug}}"
                           id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        {{$category->name}}
                    </label>
                    @error('category')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            @endforeach
            <div class="form-group">
                <label for="description">Description</label>
                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input name="description" type="text" class="form-control" placeholder="Category description"
                       value="{{old('description')}}">
            </div>

            <button type="submit" class="btn btn-primary" autofocus>Add Product</button>
        </form>
    </div>

@endsection
