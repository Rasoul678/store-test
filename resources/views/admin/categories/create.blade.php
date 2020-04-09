@extends('admin.app')
@section('title') Create Category @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Categories</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container w-75">
        <div class="mt-4 mb-3">
            <h2>Add New Category</h2>
        </div>
        <hr>
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name"><h4>Name</h4></label>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" style="font-size: 20px">
            </div>
            <div class="form-group">
                <label for="description"><h4>Description</h4></label>
                <textarea class="form-control" id="description" name="description" rows="5" style="font-size: 18px">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="parent">Parent Category <span class="m-l-5 text-danger"> *</span></label>
                <select id=parent class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror" name="parent_id">
                    <option value="0">Select a parent category</option>
                    @foreach($categories as $key => $category)
                        <option value="{{ $key }}"> {{ $category }} </option>
                    @endforeach
                </select>
                @error('parent_id') {{ $message }} @enderror
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                <a class="btn btn-danger btn-lg" role="button" href="{{ route('admin.categories.index') }}">Cancel</a>
            </div>
        </form>
    </div>


@endsection
