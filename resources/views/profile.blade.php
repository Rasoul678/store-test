@extends('layout.mainlayout')
@section('title','Profile')
@section('content')
    <div class="container">
        <h1>Profile</h1>
        <a href="{{route('order.index')}}">Order</a>
        <div class="row">
            <div class="col-4">First Name</div>
            <div class="col-4">{{$user->first_name}}</div>
        </div>
        <div class="row">
            <div class="col-4">Last Name</div>
            <div class="col-4">{{$user->last_name}}</div>
        </div>
        <div class="row">
            <div class="col-4">Email</div>
            <div class="col-4">{{$user->email}}</div>
        </div>
    </div>
@endsection
