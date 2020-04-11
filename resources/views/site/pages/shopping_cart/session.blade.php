@extends('site.app')
@section('title','Cart')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="center col-md-4 order-md-2 mb-4">
                @if($carts)
                <strong class="alert-danger">You need to log in or sign up to be able to checkout.</strong>
                @endif
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    @if($carts)
                        <span class="badge badge-secondary badge-pill">{{count($carts)}}</span>
                    @endif
                </h4>
                <ul class="list-group mb-3">
                    @if($carts)
                        @foreach($carts as $key=>$value)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{$key}}</h6>
                                    <small class="text-muted">Quantity: {{$value['quantity']}}</small>
                                </div>
                                <span class="text-muted">${{$value['price']}}</span>
                                <div>
                                    <form action="{{route('cart.removeSessionCart',['cart_item'=>$key])}}"
                                          method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn" type="submit"><i class="fa fa-minus"></i></button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                        {{--                        <li class="list-group-item d-flex justify-content-between">--}}
                        {{--                            <span>Total (IRR)</span>--}}
                        {{--                            <strong>${{$total_price}}</strong>--}}
                        {{--                        </li>--}}
                    @else
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">No Product added yet.</h6>
                                <small class="text-muted">At first, add product to cart.</small>
                            </div>
                            <span class="text-muted"></span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
