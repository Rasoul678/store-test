@extends('admin.app')
@section('title') Edit Product @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Products</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container mt-4">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4 text-center mt-2 mt-md-5 mt-lg-2">
                    @if ($product->id <=18)
                        <a href="{{route('product.show',['product'=>$product->id])}}"><img src="{{ asset('frontend/images/items/'.$product->id.'.jpg') }} " style="max-width: 200px" alt="{{ $product->name }}" title="{{ $product->name }}"></a>
                    @else
                        <a href="{{route('product.show',['product'=>$product->id])}}"><img src="{{'https://picsum.photos/id/'.$product->id.'2/700/700'}}" style="max-width: 200px" alt="product name"></a>
                    @endif
{{--                    <a href="{{$product->getFirstMediaUrl('image')}}" data-fancybox=""><img src="{{$product->getFirstMediaUrl('image')}}" style="max-width: 250px" alt="{{ $product->name }}" title="{{ $product->name }}" ></a>--}}
                </div>
                <div class="col-md-8">
                    <div class="card-body pl-md-5 pl-lg-0">
                        <h4 class="card-title">Product Details</h4>
                        <h5 class="card-subtitle mb-4 text-muted">Created at: {{$product->created_at->format('Y M d, h:i:s')}}</h5>
                        <div class="row">
                            <div class="col-lg-4 pb-1">
                                <h5 class="d-inline">Name:</h5>
                                <h6 class="d-inline">{{$product->name}}</h6>
                            </div>
                            <div class="col-lg-4 pb-1">
                                <h5 class="d-inline">Price:</h5>
                                <h6 class="d-inline">{{$product->price}}</h6>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="d-inline">Category:</h5>
                                @foreach($product->getCategories as $category)
                                    <h6 class="d-inline">{{ $category->name }}</h6>&nbsp;
                                @endforeach
                            </div>
                        </div>
                        <h5 class="mt-3">Description:</h5>
                        <h5 class="text-justify border border-dark p-3 rounded">
                            {{ $product->description }}
                        </h5>
                        <a class="btn btn-primary btn-block d-lg-inline" role="button"
                           href="{{ route('admin.products.edit', ['product'=>$product->id]) }}">
                            Edit
                        </a>
                        <a class="btn btn-danger btn-block d-lg-inline ml-lg-2" role="button"
                           href="{{ route('admin.products.index') }}">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
