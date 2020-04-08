@extends('site.app')
@section('title','Cart')
@section('content')
    <div class="container">
        <h1>Shopping Cart Detail</h1>
        @if($shopping_cart->getCartItem->first())
            <form action="{{route('order.checkoutForm')}}" method="GET">
                <button class="btn btn-primary" type="submit">Checkout</button>
            </form>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Total Price</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @forelse($shopping_cart->getCartItem as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->getProduct->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->total_price}}</td>
                    <td>
                        <form action="{{route('cart.remove',$item->id)}}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" type="submit">Remove</button>
                        </form>
                    </td>
                @empty
                        <p>The are not any products added yet!</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
