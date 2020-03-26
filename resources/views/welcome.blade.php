@extends('layout.mainlayout')
@section('title','Home Page')
@section('content')
    <div class="jumbotron text-center">
        <div class="container">
            <h1>Welcome to Store</h1>
            <h1>We serve you anything you wish</h1>
            <div class="row mt-5">
            @foreach($products as $product)
                <div class="col md-4">
                    <div class="card bg-dark text-center" style="width: 250px">
                        <img src="https://picsum.photos/500/500" style="width: 250px; height: 250px;" class="card-img-top" alt="{{$product->name}}">
                        <div class="card-body">
                            <h5 class="card-title text-light">Book Name: {{$product->name}}</h5>
                            <p class="card-text text-light">Description: {{$product->description}}</p>
                            <a href="#products.show" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
