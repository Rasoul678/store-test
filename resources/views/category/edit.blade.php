@extends('welcome')
@section('title','Category')
@section('content')
    <div class="container">
        <h1>Categories</h1>
        <form action="{{route('categories.update',['category'=>$category->slug])}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                @error('name')
                <div class="alert alert-danger">{{message}}</div>
                @enderror
                <input name="name" type="text" class="form-control" value="{{$category->name}}">
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                @error('slug')
                <div class="alert alert-danger">{{message}}</div>
                @enderror
                <input name="slug" type="text" class="form-control" value="{{$category->slug}}">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                @error('description')
                <div class="alert alert-danger">{{message}}</div>
                @enderror
                <input name="description" type="text" class="form-control" value="{{$category->description}}">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" autofocus>Save Category</button>
            </div>
        </form>
    </div>
@endsection
