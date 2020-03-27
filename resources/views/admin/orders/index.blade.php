@extends('admin.app')
@section('title') Orders @endsection
@section('content')
    <div class="container mt-2">
        <div class="mt-3">
            <h1 class="mt-5 rounded-pill bg-dark text-center p-3 text-light"> Order List</h1>
            <div class="mt-5">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th><h4>#</h4></th>
                        <th><h4>Customer</h4></th>
                        <th><h4>Date</h4></th>
                        <th><h4>Status</h4></th>
                        <th><h4>Total Price</h4></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($order as $item)
                        <tr>
                            <td>
                                <a href="{{route('admin.orders.show',['order'=>$item->id])}}">{{$loop->iteration}}</a>
                            </td>
                            <td>{{$item->getUser->first_name}} {{$item->getUser->last_name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->order_status}}</td>
                            <td>{{$item->total_price}}</td>
                            @empty
                                <div class="alert alert-info">
                                    <h4 class="text-center">Order list is empty, for now!</h4>
                                </div>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
