@extends('site.app')
@section('title', $product->name)
@section('content')
{{--    <section class="section-pagetop bg-dark p-1">--}}
{{--        <div class="container clearfix">--}}
{{--            <h5 class="text-light">--}}
{{--                Product: <span class="text-warning">{{ $product->name }}</span> ({{ $product->getCategories->first()->name }})--}}
{{--            </h5>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="section-content padding-y" id="site">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg">
                        <div class="row no-gutters card-product">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    <div class="img-big-wrap">
                                        <div>
                                            @if ($product->id <= 18)
                                                <div class="items">
                                                    <a href="{{ asset('frontend/images/items/'.$product->id.'.jpg') }}" data-fancybox="">
                                                        <img src="{{ asset('frontend/images/items/'.$product->id.'.jpg') }}" alt="{{ $product->name }}">
                                                    </a>
                                                    <button class="my-btn" style="display: none"></button>
                                                </div>
                                            @else
                                                <div class="items">
                                                    <a href="{{'https://picsum.photos/id/'.$product->id.'2/700/700'}}" data-fancybox="">
                                                        <img src="{{'https://picsum.photos/id/'.$product->id.'2/700/700'}}" alt="{{ $product->name }}">
                                                    </a>
                                                    <button class="my-btn" style="display: none"></button>
                                                </div>
                                            @endif
{{--                                            <a href="{{$product->getFirstMediaUrl('image')}}" data-fancybox=""><img src="{{$product->getFirstMediaUrl('image')}}" alt="{{ $product->name }}" title="{{ $product->name }}"></a>--}}
                                        </div>
                                    </div>
                                </article>
                            </aside>
                            <aside class="col-sm-7">
                                <article class="p-3">
                                    <h3 class="title text-center mb-3">{{ $product->name }}</h3>
                                    <div class="text-center">
                                        <a href="{{ route('category.show', $product->getCategories->first()->slug) }}" class="btn font-weight-bold text-danger">Category: {{ $product->getCategories->first()->name }}</a>
                                    </div>
{{--                                    <h5 class="text-center">Category: {{ $product->getCategories->first()->name }}</h5>--}}
                                    <div class="row mb-3 mt-3">
                                       <div class="col-12 col-md-5">
                                           <form action="{{route('cart.add',['product'=>$product->id])}}" method="POST" role="form" id="addToCart">
                                               @csrf
                                               <div class="row">
                                                   <div class="col-sm-12">
                                                       <input type="hidden" name="productId" value="{{ $product->id }}">
                                                       <input type="hidden" name="price" id="finalPrice" value="{{ $product->price }}">
                                                   </div>
                                               </div>
                                               <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                                           </form>
                                       </div>
                                        <div class="col-12 col-md-7 text-center mt-3 mt-md-0">
                                            <var class="price h5">
                                                Price: <span class="num" id="productPrice">${{$product->price}}</span>
                                            </var>
                                        </div>
                                    </div>

                                    <hr>

                                    <div>
                                        <article class="card mt-4">
                                            <div class="card-body">
                                                <p class="text-justify overflow-hidden" style="max-height: 250px">
                                                    <strong>Description:</strong><br>
                                                    {!! $product->description !!}
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis dicta earum eius error,
                                                    molestias odio perferendis sapiente tempora totam veritatis vitae. At doloribus harum modi
                                                    nostrum quae sapiente vitae?
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis dicta earum eius error,
                                                    molestias odio perferendis sapiente tempora totam veritatis vitae. At doloribus harum modi
                                                    nostrum quae sapiente vitae?
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis dicta earum eius error,
                                                    molestias odio perferendis sapiente tempora totam veritatis vitae. At doloribus harum modi
                                                    nostrum quae sapiente vitae?
                                                </p>
                                            </div>
                                        </article>
                                    </div>
                                </article>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
