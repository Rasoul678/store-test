@extends('layout.mainlayout')
@section('title','Home Page')
@section('content')
    <div class="jumbotron text-center">
        <div class="container">
            @if(session('logoutAsUser'))
            <div class="alert alert-danger">
                <h4 class="text-center">{{ session('logoutAsUser') }}</h4>
            </div>
            @elseif(session('logoutAsAdmin'))
                <div class="alert alert-danger">
                    <h4 class="text-center">{{ session('logoutAsAdmin') }}</h4>
                </div>
            @endif
            <h1>Welcome to Store</h1>
            <h1>We serve you anything you wish</h1>
            <div class="row mt-5">
                @foreach($products as $product)
                    <div class="col md-4">
                        <div class="card bg-dark text-center" style="width: 250px;  ">
                            <img src="https://picsum.photos/500/500" style="width: auto; max-height: 250px"
                                 class="card-img-top" alt="{{$product->name}}">
                            <div class="card-body">
                                <h5 class="card-title text-light">{{$product->name}}</h5>
                                <p class="card-text text-light">{{$product->description}}</p>
                                <form action="{{route('cart.add',['product'=>$product->id])}}" method="post">
                                    @csrf
                                    <button class="btn btn-primary" type="submit"><i class="material-icons">add_shopping_cart</i>Add
                                        to cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                <hr>
                {{ $products->links()}}
        </div>
    </div>
@endsection
