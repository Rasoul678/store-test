@extends('site.app')
@section('title', 'Order')
@section('content')
    @include('flash::message')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span>Your cart</span>
                    <span class="badge badge-success badge-pill">{{$shopping_cart->getCartItem->count()}}</span>
                </h4>
                <hr>
                <ul class="list-group mb-3">
                    @forelse($shopping_cart->getCartItem as $cartItem)
                        <li class="row">

                                <h6 class="my-0 col mt-2 text-truncate">{{$cartItem->getProduct->name}}</h6>
                                <small class="col text-center mt-2"><strong>Quantity: {{$cartItem->quantity}}</strong></small>

                            <h6 class="my-0 col text-center mt-2">${{$cartItem->total_price}}</h6>
                            <div>
                                <form class="col text-right" action="{{route('cart.remove',$cartItem->id)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn pr-0" type="submit"><i class="fa fa-times text-danger"></i></button>
                                </form>
                            </div>
                        </li>
                        <hr>
                    @empty
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h5 class="my-0">Cart is empty.</h5>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted"></span>
                        </li>
                    @endforelse
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <span>Total (IRR)</span>
                            <strong>${{$total_price}}</strong>
                        </div>
                    </li>
                </ul>
            </div>
{{--            @if($shopping_cart->getCartItem->first())--}}
                <div class="col-md-7 order-md-1">
                    <h4 class="mb-3">Checkout Form</h4>
                    <form class="needs-validation" novalidate="" action="{{route('order.checkout')}}"
                          method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" name="street" id="street" placeholder=""
                                       value="{{old('street') ?? $address->street ?? ''}}">
                                @error('street')
                                <div class="alert alert-danger custom-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" id="postal_code-code"
                                       placeholder="**********"
                                       value="{{old('postal_code') ?? $address->postal_code ?? ''}}">
                                @error('postal_code')
                                <div class="alert alert-danger custom-error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="distinct">Distinct</label>
                                <input type="text" class="form-control" name="distinct" id="distinct" placeholder=""
                                       value="{{old('distinct') ?? $address->distinct ?? ''}}" required="">
                                @error('distinct')
                                <div class="alert alert-danger custom-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="floor">Floor</label>
                                <input type="text" class="form-control" name="floor" id="floor" placeholder=""
                                       value="{{old('floor') ?? $address->floor ?? ''}}" required="">
                                @error('floor')
                                <div class="alert alert-danger custom-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="number">Number</label>
                                <input type="text" class="form-control" name="number" id="number" placeholder=""
                                       value="{{old('number') ?? $address->number ?? ''}}" required="">
                                @error('number')
                                <div class="alert alert-danger custom-error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   placeholder="Tehran, Valiasr st, ..." required=""
                                   value="{{old('description') ?? $address->description ?? ''}}">
                            @error('description')
                            <div class="alert alert-danger custom-error">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="city">City</label>
                                <select class="custom-select d-block w-100" name="city_id" id="city" required="true">
                                    @foreach($cities as $city)
                                        @php if ($address) {$selected=($address->city_id == $city->id) ? 'selected' : '';} else{$selected='';} @endphp
                                        <option value="{{$city->id}}">{{$city->city}}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                <div class="alert alert-danger custom-error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        @php
                        $dis_check = $shopping_cart->getCartItem->first() ? '' : 'disabled';
                        $empty_check = $shopping_cart->getCartItem->first() ? 'Continue to checkout' : 'Your cart is empty!';
                        @endphp
                        <button class="btn btn-primary btn-lg btn-block mb-3" {{ $dis_check }} type="submit">{{ $empty_check }}</button>
                    </form>
                </div>
{{--            @endif--}}
        </div>
    </div>
@endsection
