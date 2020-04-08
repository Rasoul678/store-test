@extends('site.app')
@section('title', 'Order')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{$shopping_cart->getCartItem->count()}}</span>
                </h4>
                <ul class="list-group mb-3">
                    @forelse($shopping_cart->getCartItem as $cartItem)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{$cartItem->getProduct->name}}</h6>
                                <small class="text-muted">Quantity: {{$cartItem->quantity}}</small>
                            </div>
                            <span class="text-muted">${{$cartItem->total_price}}</span>
                        </li>
                    @empty
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">No Product added yet.</h6>
                                <small class="text-muted">At first, add product to cart.</small>
                            </div>
                            <span class="text-muted"></span>
                        </li>
                    @endforelse
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (IRR)</span>
                        <strong>${{$total_price}}</strong>
                    </li>
                </ul>
            </div>
            @if($shopping_cart->getCartItem->first())
                <div class="col-md-8 order-md-1">
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
                                <div class="invalid-feedback">{{message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" id="postal_code-code"
                                       placeholder="**********"
                                       value="{{old('postal_code') ?? $address->postal_code ?? ''}}">
                                @error('postal_code')
                                <div class="invalid-feedback">{{message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="distinct">Distinct</label>
                                <input type="text" class="form-control" name="distinct" id="distinct" placeholder=""
                                       value="{{old('distinct') ?? $address->distinct ?? ''}}" required="">
                                @error('distinct')
                                <div class="invalid-feedback">{{message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="floor">Floor</label>
                                <input type="text" class="form-control" name="floor" id="floor" placeholder=""
                                       value="{{old('floor') ?? $address->floor ?? ''}}" required="">
                                @error('floor')
                                <div class="invalid-feedback">{{message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="number">Number</label>
                                <input type="text" class="form-control" name="number" id="number" placeholder=""
                                       value="{{old('number') ?? $address->number ?? ''}}" required="">
                                @error('number')
                                <div class="invalid-feedback">{{message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   placeholder="Tehran, Valiasr st, ..." required=""
                                   value="{{old('description') ?? $address->description ?? ''}}">
                            @error('description')
                            <div class="invalid-feedback">{{message}}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="city">City</label>
                                <select class="custom-select d-block w-100" name="city_id" id="city" required="true">
                                    @foreach($cities as $city)
                                        @php $selected=($address->city_id == $city->id) ? 'selected' : '' @endphp
                                        <option {{$selected}} value="{{$city->id}}">{{$city->city}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid city.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
