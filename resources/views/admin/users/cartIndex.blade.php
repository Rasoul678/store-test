@extends('admin.app')
@section('title', 'Cart Items')
@section('page-title') <i class="fa fa-shopping-cart"></i> Cart Items @endsection
@section('content')
    <div class="container">
        <div class="table-responsive-lg" style="min-height: 400px">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col" class="text-center">Active</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" style="min-width: 80px">Price</th>
                    <th scope="col" style="min-width: 80px">Total price</th>
                </tr>
                </thead>
                <tbody>
                @forelse($cart_items as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <th scope="row">{{$item->getProduct->name}}</th>
                        <th scope="row" class="text-center">{{ boolval($item->active) ? "True" : "False" }}</th>
                        <th scope="row" class="text-center">{{ $item->quantity }}</th>
                        <th scope="row">$ {{ $item->price }}</th>
                        <th scope="row">$ {{ $item->total_price }}</th>
                        @empty
                            <div class="alert alert-info text-center" role="alert">
                                No cart added, yet!
                            </div>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{$cart_items->links()}}
@endsection
