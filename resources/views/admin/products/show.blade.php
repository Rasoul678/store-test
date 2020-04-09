@extends('admin.app')
@section('title') Edit Product @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Products</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container w-75 mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Product Details</h2>
                <h5 class="card-subtitle mb-4 text-muted">Created at: {{$product->created_at->format('Y M d, h:i:s')}}</h5>
                <div class="row">
                    <div class="col-12">
                        <h4 class="d-inline text-info">Name:</h4>
                        <h5 class="d-inline">{{$product->name}}</h5>
                    </div>
                    <div class="col-12 mt-3">
                        <h4 class="d-inline text-info">Price:</h4>
                        <h5 class="d-inline">{{$product->price}}</h5>
                    </div>
                    <div class="col-12 mt-3">
                        <h4 class="d-inline text-info">Category:</h4>
                        @foreach($product->getCategories as $category)
                            <h5 class="d-inline">{{ $category->name }}</h5>&nbsp;
                        @endforeach
                    </div>
                </div>
                <h4 class="mt-3 text-info">Description:</h4>
                <h5 class="text-justify bg-secondary p-3 text-light rounded">
                    {{ $product->description }}
                </h5>
                <a class="btn btn-primary" role="button"
                   href="{{ route('admin.products.edit', ['product'=>$product->id]) }}"><i
                            class="material-icons">edit</i></a>
                <a class="btn btn-danger" role="button"
                   href="{{ route('admin.products.index') }}"><i class="material-icons">arrow_back</i></a>
            </div>
        </div>
    </div>
@endsection
