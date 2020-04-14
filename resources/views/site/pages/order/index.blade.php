@extends('site.app')
@section('title','Order')
@section('content')
    @include('flash::message')
    <div class="container">
        <h3 class="text-center mt-3">Order List</h3>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">Date</th>
                <th scope="col" class="text-center">Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse($order as $item)
                <tr>
                    <td scope="row" class="text-center"><a class="btn" href="{{route('order.show',['order'=>$item->id])}}">{{$item->created_at}}</a></td>
                    <td class="text-center">{{$item->status->description}}</td>
                    @empty
                        <p>There are not any orders submitted yet!</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
