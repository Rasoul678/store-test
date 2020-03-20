@extends('welcome')
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
                    <button class="btn btn-info"><a href="{{route('products.edit',['product'=>$product->id])}}">Edit</a>
                    </button>
                    <form action="{{route('products.destroy',['product'=>$product->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        <table class="table">
            <thead>Category</thead>
            <tbody>
            @foreach($product->getCategories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            <h2>Description:</h2>
            <div class="jumbotron">{{$product->description}}</div>
        </div>
    </div>
@endsection
