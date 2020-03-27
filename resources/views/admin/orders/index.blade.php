@extends('admin.app')
@section('title') Orders @endsection
@section('content')
    <div class="container mt-2">
        <div class="mt-3">
            <h2>Order List</h2>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($order as $item)
                        <tr>
                            <td><a href="{{route('admin.orders.show',['order'=>$item->id])}}">{{$loop->iteration}}</a></td>
                            <td>{{$item->getUser->first_name}} {{$item->getUser->last_name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->order_status}}</td>
                            <td>{{$item->total_price}}</td>
                            @empty
                                <p>There are not any orders submitted yet!</p>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
