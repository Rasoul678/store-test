@extends('welcome')
@section('title','Order')
@section('content')
    <div class="container">
        <h1>Order List</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse($order as $item)
                <tr>
                    <th scope="row"><a href="{{route('order.show',['order'=>$item->id])}}">{{$loop->iteration}}</a></th>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->order_status}}</td>
                    @empty
                        <p>The are not any products added yet!</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
