@extends('site.app')
@section('title','Cart')
@section('content')
{{--    @if($carts)--}}
{{--        <div class="alert alert-danger alert-dismissible fade show" role="alert" >--}}
{{--            You need to log in or sign up to be able to checkout.--}}
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @else--}}
{{--        <div class="alert alert-warning alert-dismissible fade show" role="alert" >--}}
{{--            Your cart is empty at the moment.--}}
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}
    @include('flash::message')
    <div class="container mt-3">
        <div class="row">
            <div class="center col-md-4 order-md-2 mb-4">
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
                                <h6 class="my-0">Cart is empty.</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted"></span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
