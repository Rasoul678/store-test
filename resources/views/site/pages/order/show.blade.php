@extends('site.app')
@section('title', 'Order')
@section('content')
    @include('flash::message')
    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-12 col-md-6">
                <h4 class="text-center rounded p-1">Order Details</h4>
            </div>
            <div class="col-12 col-md-6">
                <h4 class="text-center rounded p-1">Total price: ${{$order->total_price}}</h4>
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
                    <td class="text-center text-truncate" scope="row"><strong>{{$item->getProduct->name}}</strong></td>
                    <td class="text-center"><strong>{{$item->quantity}}</strong></td>
                    <td class="text-center"><strong>{{$item->created_at->format('Y M d')}}</strong></td>
                    <td class="text-center"><strong>{{$item->total_price}}</strong></td>
                    @empty
                        <p>The are not any products added yet!</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
