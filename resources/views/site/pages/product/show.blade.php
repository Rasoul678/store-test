@extends('site.app')
@section('title', $product->name)
@section('content')
    <section class="section-pagetop bg-dark p-1">
        <div class="container clearfix">
            <h5 class="text-light">
                Product: <span class="text-warning">{{ $product->name }}</span> ({{ $product->getCategories->first()->name }})
            </h5>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" id="site">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    <div class="img-big-wrap">
                                        <div class="padding-y">
                                            @if ($product->id <= 18)
                                                <a href="{{ asset('frontend/images/items/'.$product->id.'.jpg') }}" data-fancybox=""><img src="{{ asset('frontend/images/items/'.$product->id.'.jpg') }}" alt=""></a>
                                            @else
                                                <a href="{{'https://picsum.photos/id/'.$product->id.'2/700/700'}}" data-fancybox=""><img src="{{'https://picsum.photos/id/'.$product->id.'2/700/700'}}" alt=""></a>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </aside>
                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h3 class="title mb-3">{{ $product->name }}</h3>
                                    <div class="mb-3">
                                        <var class="price h3 text-success">
                                            <span class="num" id="productPrice">{{money_format($product->price,2)}}</span>
                                        </var>
                                    </div>
                                    <hr>
                                    <form action="{{route('cart.add',['product'=>$product->id])}}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                                <input type="hidden" name="price" id="finalPrice" value="{{ $product->price }}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                                    </form>
                                </article>
                            </aside>

                            <div class="col-md-12">
                                <article class="card mt-4">
                                    <div class="card-body">
                                        <h5>{!! $product->description !!}</h5>
                                    </div>
                                </article>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop






{{--@extends('site.app')--}}
{{--@section('title')Product: {{$product->name}}@endsection--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h1>Product Detail</h1>--}}
{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col">Name</th>--}}
{{--                <th scope="col">Type</th>--}}
{{--                <th scope="col">Price</th>--}}
{{--                <th scope="col">&nbsp;</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <td>{{$product->name}}</td>--}}
{{--                <td>{{$product->type}}</td>--}}
{{--                <td>{{money_format($product->price,2)}}</td>--}}
{{--                <td>--}}
{{--                    <form action="{{route('cart.add',['product'=>$product->id])}}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <button class="btn btn-primary"><i class="material-icons">add_shopping_cart</i>Add to cart--}}
{{--                        </button>--}}
{{--                    </form>--}}

{{--                </td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--        <div class="row">--}}
{{--            <div class="col md-6">--}}
{{--                <label class="form-check-label">Category: </label>--}}
{{--                <div class="form-group custom-control-inline">--}}
{{--                    @foreach($product->getCategories as $category)--}}
{{--                        <span class="badge badge-primary">{{ $category->name }}</span>&nbsp;--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <h2>Description:</h2>--}}
{{--            <div class="jumbotron">{{$product->description}}</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
