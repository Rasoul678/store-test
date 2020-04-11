@extends('site.app')
@section('title', 'Order')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-5">
            <div class="col-12 col-md-6">
                <h3 class="text-center">Order Details</h3>
            </div>
            <div class="col-12 col-md-6">
                <h3 class="text-center">Total price: ${{$order->total_price}}</h3>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
            <tr>
{{--                <th class="text-center" scope="col">#</th>--}}
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Quantity</th>
                <th class="text-center" scope="col">Created</th>
                <th class="text-center" scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @forelse($order->getOrderItem as $item)
                <tr>
{{--                    <th class="text-center" scope="row">{{$loop->iteration}}</th>--}}
                    <td class="text-center text-truncate" scope="row">{{$item->getProduct->name}}</td>
                    <td class="text-center">{{$item->quantity}}</td>
                    <td class="text-center">{{$item->created_at->format('Y M d')}}</td>
                    <td class="text-center">{{$item->total_price}}</td>
                    @empty
                        <p>The are not any products added yet!</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
