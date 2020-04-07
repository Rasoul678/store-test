@extends('site.app')
@section('title','Order')
@section('content')
    <div class="container">
        <h1>Order List</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse($order as $item)
                <tr>
                    <td scope="row"><a href="{{route('order.show',['order'=>$item->id])}}">{{$item->created_at}}</a></td>
                    <td>{{$item->order_status}}</td>
                    @empty
                        <p>There are not any orders submitted yet!</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
