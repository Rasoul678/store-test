@extends('admin.app')
@section('title', 'Edit Category: ' . $category->name)
@section('page-title') <i class="fa fa-tags"></i> Category: {{$category->name}} @endsection
@section('content')
    <div class="container">
        <h2 class="mt-2 mb-3">Edit Category</h2>
        <hr>
        <form action="{{route('admin.categories.update',['category'=>$category->slug])}}" method="post">
            @method('PATCH') @csrf
            <div class="form-group">
                <label for="name"><h6>Name</h6></label>
                @error('name')
                <div class="alert alert-danger custom-error">{{$message}}</div>
                @enderror
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name', $category->name) }}">
            </div>

            <div class="form-group">
                <label for="description"><h6>Description</h6></label>
                @error('description')
                <div class="alert alert-danger custom-error">{{$message}}</div>
                @enderror
                <textarea class="form-control" id="description"
                          name="description" rows="4">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="parent">Parent Category <span class="m-l-5 text-danger"> *</span></label>
                <select id=parent class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror" name="parent_id">
                    <option value="0">Select a parent category</option>
                    @foreach($categories as $key => $category)
                        @if ($targetCategory->parent_id == $key)
                            <option value="{{ $key }}" selected> {{ $category }} </option>
                        @else
                            <option value="{{ $key }}"> {{ $category }} </option>
                        @endif
                    @endforeach
                </select>
                @error('parent_id') {{ $message }} @enderror
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-danger" role="button"
                   href="{{ route('admin.categories.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
