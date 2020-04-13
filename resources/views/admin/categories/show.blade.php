@extends('admin.app')
@section('title', 'Category: ' . $category->name)
@section('page-title') <i class="fa fa-tags"></i> Category: {{$category->name}} @endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Category Details</h2>
                <h5 class="card-subtitle mb-4 text-muted">Created at: {{$category->created_at->format('Y M d, h:i:s')}}</h5>
                <h5 class="mt-5 d-inline">Name:</h5>
                <h5 class="mt-5 d-inline">{{$category->name}}</h5>
                <h5 class="mt-3">Description:</h5>
                <h5 class="text-justify p-3 border border-dark rounded">
                    {{ old('description', $category->description) }}
                </h5>

                <a class="btn btn-primary btn-block d-md-inline mr-md-1" role="button"
                   href="{{ route('admin.categories.edit', ['category'=>$category->slug]) }}">
                    Edit
                </a>
                <a class="btn btn-danger btn-block d-md-inline" role="button"
                   href="{{ route('admin.categories.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection
