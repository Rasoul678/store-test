@extends('admin.app')
@section('title') Create Category @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Categories</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container">
        <div class="mt-4 mb-3">
            <h4>Add New Category</h4>
        </div>
        <hr>
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="name"><h6>Name</h6></label>
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-1">
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
                </div>
            </div>
            <div class="form-group">
                <label for="description"><h6>Description</h6></label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
            </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger" role="button" href="{{ route('admin.categories.index') }}">Cancel</a>
        </form>
    </div>
@endsection
