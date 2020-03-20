@extends('welcome')
@section('title','Product')
@section('content')
    <div class="container">
        <h1>Product</h1>
        <form action="{{route('products.update',['product'=>$product->id])}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                @error('name')
                <div class="alert alert-danger">{{message}}</div>
                @enderror
                <input name="name" type="text" class="form-control" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                @error('price')
                <div class="alert alert-danger">{{message}}</div>
                @enderror
                <input name="price" type="number" step="0.01" min="0" class="form-control" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                @error('type')
                <div class="alert alert-danger">{{message}}</div>
                @enderror
                <input name="type" type="text" class="form-control" value="{{$product->type}}">
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
                <div class="alert alert-danger">{{message}}</div>
                @enderror
                <input name="description" type="text" class="form-control" value="{{$product->description}}">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" autofocus>Save Product</button>
            </div>
        </form>
    </div>
@endsection
