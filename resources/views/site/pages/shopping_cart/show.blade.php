@extends('site.app')
@section('title','Cart')
@section('content')
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($shopping_cart->getCartItem as $item)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..."
                                                                 class="img-responsive"></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">{{$item->getProduct->name}}</h4>
                                <p>{{$item->getProduct->description}}</p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{$item->getProduct->price}}</td>
                    <td data-th="Quantity">{{$item->quantity}}</td>
                    <td data-th="Subtotal" class="text-center">${{$item->total_price}}</td>
                    <td class="actions" data-th="">
                        <form action="{{route('cart.remove',$item->id)}}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" type="submit">Remove</button>
                        </form>
                    </td>
                    @empty
                        <td>The are not any products added yet!</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td><a href="{{route('home')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a></td>
                @if($shopping_cart->getCartItem->first())
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total ${{$total_price}}</strong></td>
                    <td><a href="{{route('order.checkoutForm')}}" class="btn btn-success btn-block">Checkout <i
                                class="fa fa-angle-right"></i></a></td>
                @else
                    <td colspan="4" class="hidden-xs"></td>
                @endif
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
