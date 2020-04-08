@extends('site.app')
@section('title', 'Homepage')
@section('content')

    <section class="section-content bg padding-y">
        <div class="container">
            <div id="code_prod_complex">
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <figure class="card card-product bg border border-secondary">
                                @if ($product->id <=18)
                                    <div class="img-wrap padding-y"><a href="{{route('product.show',['product'=>$product->id])}}"><img src="{{ asset('frontend/images/items/'.$product->id.'.jpg') }}" alt="{{ $product->name }}" title="{{ $product->name }}"></a></div>
                                @else
                                    <div class="img-wrap padding-y"><a href="{{route('product.show',['product'=>$product->id])}}"><img src="{{'https://picsum.photos/id/'.$product->id.'2/700/700'}}" alt=""></a></div>
                                @endif
                                <figcaption class="info-wrap text-center bg-secondary">
                                    <h5 class="title bg-warning rounded m-0 mb-1 p-1">Name: {{ $product->name }}</h5>
                                    <div class="row">
                                        <div class="col-8">
                                            <h6 class="price bg-primary text-light rounded mt-1 p-2">${{ $product->price }} </h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <form action="{{route('cart.add',['product'=>$product->id])}}" method="POST" role="form" id="addToCart">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->price }}">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    @empty
                        <div class="alert alert-warning col-12" role="alert">
                            <h4 class="text-center">No Products found</h4>
                        </div>
                    @endforelse
                </div>
                {{ $products->links('pagination.default')}}
            </div>
        </div>
    </section>
@stop
