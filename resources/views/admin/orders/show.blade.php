@extends('admin.app')
@section('title') Orders @endsection
@section('content')
    <div class="container mt-2">
        <div class="mt-3">
            <h2>Order Detail</h2>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($order->getOrderItem as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            @php $product = $item->getProduct()->withTrashed()->pluck('name')->first() @endphp
                            <td>{{$product}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{money_format($item->price,2)}}</td>
                            <td>{{money_format($item->total_price,2)}}</td>
                            @empty
                                <p>The are not any products added yet!</p>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
