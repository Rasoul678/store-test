@extends('site.app')
@section('title','Cart')
@section('content')
    <div class="app-title">
        <div>
            <h1></h1>
        </div>
    </div>
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <div class="col-4 col-lg-8">
                <h3><i class="fa fa-shopping-cart"></i></h3>
            </div>
            @if($shopping_cart->getCartItem->first())
                <div class="col-xl-auto col-lg-4 col-md-2">
                    <a class="btn btn-success" href="{{route('order.checkoutForm')}}">Checkout <i
                            class="fa fa-angle-right"></i></a>
                </div>
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="table-responsive mt-3">
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">
                            <div class="col-md-6"><h6 class="text-left m-0 p-1">Product</h6></div>
                        </th>
                        <th scope="col"><h6 class="text-center m-0 p-1">Price</h6></th>
                        <th scope="col"><h6 class="text-center m-0 p-1">Quantity</h6></th>
                        <th scope="col"><h6 class="text-center m-0 p-1">Subtotal</h6></th>
                        <th scope="col"><h6 class="text-center m-0 p-1">&nbsp;</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($shopping_cart->getCartItem as $item)
                        <tr>
                            <td class="text-left">
                                {{--                                <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..."--}}
                                {{--                                                                     class="img-responsive"></div>--}}
                                {{--                                <div class="col-sm-10">--}}
                                <h4>{{$item->getProduct->name}}</h4>
                                {{--                                </div>--}}
                            </td>
                            <td class="text-center">${{$item->getProduct->price}}</td>
                            <td class="text-center">{{$item->quantity}}</td>
                            <td class="text-center">${{$item->total_price}}</td>
                            <td>
                                <form action="{{route('cart.remove',$item->id)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="material-icons">delete_forever</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>The are not any products added yet!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
