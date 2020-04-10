@extends('admin.app')
@section('title') Orders @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-truck"></i> Orders</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="d-flex justify-content-center">
        <table class="table table-hover table-sm mt-3" style="max-width: 120px">
            <thead class="thead-dark">
            <tr>
                <th scope="col"><h6 class="text-center m-0 p-1">Customer</h6></th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $item)
                <tr>
                    <th scope="row" style="height: 53px"><h6 class="text-center text-truncate m-0" style="max-width: 120px">{{$item->getUser->first_name}} {{$item->getUser->last_name}}</h6></th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="table-responsive mt-3">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"><h6 class="text-center m-0 p-1">Date</h6></th>
                    <th scope="col"><h6 class="text-center m-0 p-1">Status</h6></th>
                    <th scope="col"><h6 class="text-center m-0 p-1">Total Price</h6></th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $item)
                    <tr>
                        <td><h6 class="text-center">{{$item->created_at->format('Y M d, h:i:s')}}</h6></td>
                        <td ><h6 class="text-center">{{$item->order_status}}</h6></td>
                        <td ><h6 class="text-center">{{$item->total_price}}</h6></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $order->links('pagination.default')}}
        </div>
    </div>
@endsection
