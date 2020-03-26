@extends('layout.mainlayout')
@section('title')Product: {{$product->name}}@endsection
@section('content')
    <div class="container">
        <h1>Product Detail</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Price</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->type}}</td>
                <td>{{money_format($product->price,2)}}</td>
                <td>
                    <form action="{{route('cart.add',['product'=>$product->id])}}" method="POST">
                        @csrf
                        <button class="btn btn-primary"><i class="material-icons">add_shopping_cart</i>Add to cart
                        </button>
                    </form>

                </td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col md-6">
                <label class="form-check-label">Category: </label>
                <div class="form-group custom-control-inline">
                    @foreach($product->getCategories as $category)
                        <span class="badge badge-primary">{{ $category->name }}</span>&nbsp;
                    @endforeach
                </div>
            </div>
        </div>
        <div>
            <h2>Description:</h2>
            <div class="jumbotron">{{$product->description}}</div>
        </div>
    </div>
@endsection
