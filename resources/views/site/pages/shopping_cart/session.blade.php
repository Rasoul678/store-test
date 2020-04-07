@extends('site.app')
@section('title','Cart')
@section('content')
    <div class="container">
        <h1>Shopping Cart Detail</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($carts)
                @forelse($carts as $key=>$item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$key}}</td>
                        <td>{{count($item)}}</td>
                        <td>
                            <form action="{{route('cart.removeSessionCart',['cart_item'=>$key])}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                        @empty
                            <p>The are not any products added yet!</p>
                    </tr>
                @endforelse
            @else
                <tr><p>The are not any products added yet!</p></tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
