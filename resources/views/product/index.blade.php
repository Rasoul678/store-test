@extends('layout.mainlayout')
@section('title','Product')
@section('content')
    <div class="container">
        <h1>Products</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><a href="{{route('products.show',['product'=>$product->id])}}">{{$product->name}}</a></td>
                    <td>{{$product->type}}</td>
                    <td>{{$product->price}}</td>
                    @empty
                        <p>The are not any products added yet!</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
