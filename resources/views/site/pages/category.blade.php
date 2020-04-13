@extends('site.app')
@section('title', $category->name)
@section('content')
{{--    <section class="section-pagetop bg-dark p-1">--}}
{{--        <div class="container clearfix m-0">--}}
{{--            <h5 class="text-warning m-0">--}}
{{--                <i class="material-icons">chevron_right</i>{{ $category->name }}--}}
{{--            </h5>--}}
{{--        </div>--}}
{{--    </section>--}}
<section class="section-content padding-y">
        <div class="container">
            <div id="code_prod_complex">
                <div class="row">
                    @forelse($category->getProducts as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <figure class="card card-product bg border border-secondary">
                                @if ($product->id <=18)
                                    <div class="img-wrap padding-y"><a href="{{route('product.show',['product'=>$product->id])}}"><img src="{{ asset('frontend/images/items/'.$product->id.'.jpg') }}" alt="{{ $product->name }}" title="{{ $product->name }}"></a></div>
                                @else
                                    <div class="img-wrap padding-y"><a href="{{route('product.show',['product'=>$product->id])}}"><img src="{{'https://picsum.photos/id/'.$product->id.'2/700/700'}}" alt="product name"></a></div>
                                @endif
{{--                                    <div class="img-wrap padding-y">--}}
{{--                                        <a href="{{$product->getFirstMediaUrl('image')}}" data-fancybox=""><img src="{{$product->getFirstMediaUrl('image')}}" alt="{{ $product->name }}" title="{{ $product->name }}" ></a>--}}
{{--                                    </div>--}}
                                <div class="card-body border-top">
                                    <p class="card-text m-0"><strong>Product: </strong>{{ $product->name }}</p>
                                    <p class="card-text text-justify" style="height: 60px; overflow: hidden"><strong>Description:</strong><br> {{ \Illuminate\Support\Str::limit($product->description .
                                        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis dicta earum eius error,',60, ' (...)')}}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-md btn-outline-primary rounded mr-1" href="{{route('product.show',['product'=>$product->id])}}" role="button">Details</a>
                                            <form action="{{route('cart.add',['product'=>$product->id])}}" method="POST" role="form" id="addToCart">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->price }}">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-md btn-outline-success"><i class="fas fa-shopping-cart"></i></button>
                                            </form>
                                        </div>
                                        <small class="text-dark">${{ $product->price }}</small>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    @empty
                        <div class="alert alert-warning col-12" role="alert">
                            <h4>No Products found in {{ $category->name }}</h4>
                        </div>
                    @endforelse
                </div>
                {{ $category_link->links('pagination.default')}}
            </div>
        </div>
    </section>
@stop
