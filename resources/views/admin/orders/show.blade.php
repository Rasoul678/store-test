@extends('admin.app')
@section('title', 'Order Detail: ' . $order->id)
@section('page-title') <i class="fa fa-truck"></i> Order Detail: <small>{{$order->getUser->getFullNameAttribute()}}</small> @endsection
@section('content')
    <div class="container">
        <div class="row">
            <form class="d-flex justify-content-start col-12 col-md-6" action="{{route('admin.orders.update',['order'=>$order->id])}}" method="POST">
                @csrf @method('PATCH')
                <label for="status" class="mt-2"><strong>Status: </strong></label>
                <select class="custom-select" id="status" name="status" style="width: 200px">
                    @foreach($status as $key=>$value)
                        @php $selected = $order->status->value==$key ? 'selected' : ''@endphp
                        <option {{$selected}} value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-info ml-1">Update</button>
            </form>
        </div>
        <div class="table-responsive-lg mt-3" style="min-height: 370px">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" style="min-width: 120px">Unit Price</th>
                    <th scope="col" style="min-width: 100px">Total price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->getOrderItem as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        @php $product = $item->getProduct()->withTrashed()->pluck('name')->first() @endphp
                        <th scope="row">{{$product}}</th>
                        <th scope="row" class="text-truncate text-center">{{$item->quantity}}</th>
                        <th scope="row">${{$item->price}}</th>
                        <th scope="row">${{$item->total_price}}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
