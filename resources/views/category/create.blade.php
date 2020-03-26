@extends('layout.mainlayout')
@section('title','Create Category')
@section('content')
    <div class="container">
        <h1>Create Category</h1>
        <form action="{{route('categories.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input name="name" type="text" class="form-control" placeholder="Category name" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input name="description" type="text" class="form-control" placeholder="Category description" value="{{old('description')}}">
            </div>

            <button type="submit" class="btn btn-primary" autofocus>Add Category</button>
        </form>
    </div>

@endsection
