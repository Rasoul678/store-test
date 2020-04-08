@extends('site.app')
@section('title', 'Order')
@section('content')
    <div class="container">
        <h1>Order Detail</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
            </tr>
            </thead>
            <tbody>
            @forelse($order->getOrderItem as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->getProduct->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->total_price}}</td>
                    @empty
                        <p>The are not any products added yet!</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
