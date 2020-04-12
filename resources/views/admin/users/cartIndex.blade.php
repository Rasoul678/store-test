@extends('admin.app')
@section('title') Cart Items
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-cart"></i> Cart Items</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container">
        <div class="table-responsive-xl mt-3">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"><h4 class="text-center">Product</h4></th>
                    <th scope="col"><h4 class="text-center">Active</h4></th>
                    <th scope="col"><h4 class="text-center">Quantity</h4></th>
                    <th scope="col"><h4 class="text-center">Price</h4></th>
                    <th scope="col"><h4 class="text-center">Total price</h4></th>
                </tr>
                </thead>
                <tbody>
                @forelse($cart_items as $item)
                    <tr>
                        <th><h5 class="text-center">{{$loop->iteration}}</h5></th>
                        <th><h5 class="text-center">{{$item->getProduct->name}}</h5></th>
                        <td><h5 class="text-center">{{ boolval($item->active) ? "True" : "False" }}</h5></td>
                        <td><h5 class="text-center">{{ $item->quantity }}</h5></td>
                        <td><h5 class="text-center">$ {{ $item->price }}</h5></td>
                        <td><h5 class="text-center">$ {{ $item->total_price }}</h5></td>
                        @empty
                            <p>There are not any carts added yet!</p>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{$cart_items->links('pagination.default')}}
@endsection
