@extends('site.app')
@section('title','Cart')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 p-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span>Your cart</span>
                    @if($carts)
                        <span class="badge badge-success badge-pill">{{count($carts)-1}}</span>
                    @else
                        <span class="badge badge-success badge-pill">0</span>
                    @endif
                </h4>
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-left w-50" scope="row">Product</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center w-">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($carts)
                            @foreach($carts as $key=>$value)
                                @if($key!='total_price')
                                    <tr>
                                        <th class="text-left align-middle" scope="row">
                                            <h6 class="text-truncate">{{$key}}</h6>
                                        </th>
                                        <td class="text-center align-middle">{{$value['quantity']}}</td>
                                        <td class="text-center align-middle">${{$value['price']}}</td>
                                        <td class="text-center align-middle">
                                            <div class="custom-control-inline">
                                                <form action="{{route('product.show',['product'=>$value['id']])}}"
                                                      method="GET">
                                                    @csrf
                                                    <button class="btn btn-outline-primary text-dark" type="submit">
                                                        View
                                                    </button>
                                                </form>
                                                <form action="{{route('cart.removeGuestCart',['cart_item'=>$key])}}"
                                                      method="POST">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-outline-danger text-dark" type="submit">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <td class="align-middle" colspan="2"><strong>Total Price</strong></td>
                            <td class="text-center align-middle">${{$carts['total_price']}}</td>
                            <td>&nbsp;</td>
                        </tr>
                        </tfoot>
                        @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
