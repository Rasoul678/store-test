@extends('admin.app')
@section('title') Edit Category @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Categories</h1>
        </div>
    </div>
    <div class="container w-75">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Category Details</h2>
                <h5 class="card-subtitle mb-4 text-muted">Created at: {{$category->created_at->format('Y M d, h:i:s')}}</h5>
                <h4 class="mt-5 d-inline text-info">Name:</h4>
                <h5 class="mt-5 d-inline">{{$category->name}}</h5>
                <h4 class="mt-3 text-info">Description:</h4>
                <h5 class="text-justify bg-secondary p-3 text-light rounded">
                    {{ old('description', $category->description) }}
                </h5>

                <a class="btn btn-primary" role="button"
                   href="{{ route('admin.categories.edit', ['category'=>$category->slug]) }}"><i
                            class="material-icons">edit</i></a>
                <a class="btn btn-danger" role="button"
                   href="{{ route('admin.categories.index') }}"><i class="material-icons">arrow_back</i></a>
            </div>
        </div>
    </div>
@endsection
