@extends('admin.app')
@section('title') Orders @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-truck"></i> Orders</h1>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive-xl mt-3">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"><h4 class="text-center">Customer</h4></th>
                    <th scope="col"><h4 class="text-center">Date</h4></th>
                    <th scope="col"><h4 class="text-center">Status</h4></th>
                    <th scope="col"><h4 class="text-center">Total Price</h4></th>
                </tr>
                </thead>
                <tbody>
                @forelse($order as $item)
                    <tr>
                        <th scope="row"><h5 class="text-center">{{ $loop->iteration }}</h5></th>
                        <td><h4 class="text-center">{{$item->getUser->first_name}} {{$item->getUser->last_name}}</h4></td>
                        <td><h4 class="text-center">{{$item->created_at}}</h4></td>
                        <td><h4 class="text-center">{{$item->order_status}}</h4></td>
                        <td><h4 class="text-center">{{$item->total_price}}</h4></td>
                        @empty
                            <div class="alert alert-info">
                                <h4 class="text-center">Order list is empty, for now!</h4>
                            </div>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $order->links()}}
    </div>
@endsection
