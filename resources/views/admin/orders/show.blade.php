@extends('admin.app')
@section('title') Order Detail: {{$order->id}} @endsection
@section('content')
    <div class="container mt-2">
        <div class="mt-3">
            <div class="container row">
                <h2><a href="#">{{$order->getUser->first_name}} {{$order->getUser->last_name}}</a>
                    <small>@ {{$order->updated_at->format('Y M d, h:i:s')}}</small>
                </h2>
                <div class="ml-auto form-inline">
                    <form action="{{route('admin.orders.update',['order'=>$order->id])}}" method="POST">
                        @csrf @method('PATCH')
                        <h3>Status:</h3>
                        <select class="custom-select" id="status" name="status">
                            @foreach($status as $key=>$value)
                                @php $selected = $order->status->value==$key ? 'selected' : ''@endphp
                                <option {{$selected}} value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total Item Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($order->getOrderItem as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            @php $product = $item->getProduct()->withTrashed()->pluck('name')->first() @endphp
                            <td>{{$product}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->total_price}}</td>
                            @empty
                                <p>The are not any products added yet!</p>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="4">Total price</td>
                        <td>{{$order->total_price}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
