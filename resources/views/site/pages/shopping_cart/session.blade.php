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
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span>Your cart</span>
            @if($carts)
                <span class="badge badge-success badge-pill">{{count($carts)}}</span>
            @endif
        </h4>
        <hr>
        <ul class="list-group mb-3">
            @if($carts)
                @foreach($carts as $key=>$value)
                    <li class="row">
                        <h6 class="my-0 col mt-2">{{$key}}</h6>
                        <small class="col text-center mt-2"><strong>Quantity: {{$value['quantity']}}</strong></small>
                        <h6 class="my-0 col text-center mt-2">${{$value['price']}}</h6>
                        <form class="col text-right" action="{{route('cart.removeSessionCart',['cart_item'=>$key])}}"
                              method="POST">
                            @csrf @method('DELETE')
                            <button class="btn" type="submit"><i class="fa fa-times text-danger"></i></button>
                        </form>
                    </li>
                    <hr>
                @endforeach
            @else
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h5 class="my-0">Cart is empty.</h5>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted"></span>
                </li>
            @endif
        </ul>
    </div>
@endsection
