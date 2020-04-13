@extends('site.app')
@section('title', 'Homepage')
@section('content')

    <section class="section-content padding-y">
        <div class="container">
            <p class="font-weight-bold">All Products</p>
            <hr class="my-4">
            <div id="code_prod_complex">
                <div class="row">
                    @forelse($AllProducts as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <figure class="card card-product bg border border-secondary">
                                @if ($product->id <=18)
                                    <div class="img-wrap padding-y"><a href="{{route('product.show',['product'=>$product->id])}}"><img src="{{ asset('frontend/images/items/'.$product->id.'.jpg') }}" alt="{{ $product->name }}" title="{{ $product->name }}"></a></div>
                                @else
                                    <div class="img-wrap padding-y"><a href="{{route('product.show',['product'=>$product->id])}}"><img src="{{'https://picsum.photos/id/'.$product->id.'2/700/700'}}" alt="product name"></a></div>
                                @endif
{{--                                <div class="img-wrap padding-y">--}}
{{--                                    <a href="{{$product->getFirstMediaUrl('image')}}" data-fancybox=""><img src="{{$product->getFirstMediaUrl('image')}}" alt="{{ $product->name }}" title="{{ $product->name }}" ></a>--}}
{{--                                </div>--}}
                                    <div class="card-body border-top p-3">
                                        <p class="card-text m-0"><strong>Product: </strong>{{ $product->name }}</p>
                                        <p class="card-text text-justify" style="height: 85px; overflow: hidden"><strong>Description:</strong> <br> {{ \Illuminate\Support\Str::limit($product->description .
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
                                            <strong class="text-dark">${{ $product->price }}</strong>
                                        </div>
                                    </div>
                            </figure>
                        </div>
                    @empty
                        <div class="alert alert-warning col-12" role="alert">
                            <h4 class="text-center">No Products found</h4>
                        </div>
                    @endforelse
                </div>
                {{ $AllProducts->links('pagination.default')}}
            </div>
        </div>
    </section>
    {{------------------------------------------------------------- SliderImage  ------------------------------------------------}}
    @foreach($categories as $category)
        @if($category->name !== 'Root')
            <div class="container my-4">

                <p class="font-weight-bold">Bootstrap carousel multiple items</p>

                <hr class="my-4">

                <!--Carousel Wrapper-->
                <div id="{{ $category->name }}" class="carousel slide carousel-multi-item" data-ride="carousel">

                    <!--Controls-->
                    <div class="d-flex justify-content-between controls-top text-center">
                        <a class="btn" href="#{{ $category->name }}" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a href="{{ route('category.show', $category->slug) }}" class="btn"><strong>{{ $category->name }}</strong></a>
                        <a class="btn" href="#{{ $category->name }}" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </div>
                    <!--/.Controls-->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                        @foreach($category->getProducts->chunk(3) as $products)
                            @if($loop->first)
                                <div class="carousel-item active">
                                    @foreach($products as $item)
                                        @if($loop->first)
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card mb-2">
                                                        <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                                                             alt="Card image cap">
                                                        <div class="card-body">
                                                            <h4 class="card-title">{{ $item->name }}</h4>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                                card's content.</p>
                                                            <a class="btn btn-primary">Button</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                    <div class="col-md-4 clearfix d-none d-md-block">
                                                        <div class="card mb-2">
                                                            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                                                                 alt="Card image cap">
                                                            <div class="card-body">
                                                                <h4 class="card-title">{{ $item->name }}</h4>
                                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                                    card's content.</p>
                                                                <a class="btn btn-primary">Button</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @endforeach
                                            </div>
                                </div>
                            @else
                                <div class="carousel-item">
                                    @foreach($products as $item)
                                        @if($loop->first)
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card mb-2">
                                                        <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                                                             alt="Card image cap">
                                                        <div class="card-body">
                                                            <h4 class="card-title">{{ $item->name }}</h4>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                                card's content.</p>
                                                            <a class="btn btn-primary">Button</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                    <div class="col-md-4 clearfix d-none d-md-block">
                                                        <div class="card mb-2">
                                                            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                                                                 alt="Card image cap">
                                                            <div class="card-body">
                                                                <h4 class="card-title">{{ $item->name }}</h4>
                                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                                    card's content.</p>
                                                                <a class="btn btn-primary">Button</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @endforeach
                                            </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!--/.Slides-->
                </div>
                <!--/.Carousel Wrapper-->


            </div>
        @endif

    @endforeach

    {{----------------------------------------------------------------------------  EndOfSliderImage  ------------------------------------------------------------------------}}

@stop
