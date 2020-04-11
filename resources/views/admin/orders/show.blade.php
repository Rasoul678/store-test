@extends('admin.app')
@section('title') Order Detail: {{$order->id}} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-truck"></i> Orders</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container mt-2">
            <div class=" row">
                <h4 class="col-12 col-md-5">
                    {{$order->getUser->first_name}} {{$order->getUser->last_name}}
{{--                    <small>@ {{$order->updated_at->format('Y M d, h:i:s')}}</small>--}}
                </h4>
{{--                <div class=" col-12 col-md-3">--}}
                    <form class="col-12 col-md-7 form-inline" action="{{route('admin.orders.update',['order'=>$order->id])}}" method="POST">
                        @csrf @method('PATCH')
{{--                        <h5>Status:</h5>--}}
                        <div class="form-group">
                        <label for="status">Status: </label>
                        <select class="custom-select" id="status" name="status">
                            @foreach($status as $key=>$value)
                                @php $selected = $order->status->value==$key ? 'selected' : ''@endphp
                                <option {{$selected}} value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary ml-1 mt-2 mt-sm-0">Update</button>
                    </form>
{{--                </div>--}}
            </div>
        <div class="d-flex justify-content-center">
            <table class="table table-hover table-sm mt-3" style="max-width: 120px">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"><h6 class="text-center m-0 p-1">#</h6></th>
                    <th scope="col"><h6 class="text-center m-0 p-1">Product</h6></th>
                </tr>

                </thead>
                <tbody>
                @foreach($order->getOrderItem as $item)
                    <tr>
                        <th scope="row" style="height: 53px"><h6 class="text-center text-truncate m-0" style="max-width: 120px">{{$loop->iteration}}</h6></th>
                        @php $product = $item->getProduct()->withTrashed()->pluck('name')->first() @endphp
                        <td style="height: 53px"><h6 class="text-center text-truncate m-0" style="max-width: 120px">{{$product}}</h6></td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            <div class="table-responsive mt-3">
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><h6 class="text-center m-0 p-1">Quantity</h6></th>
                        <th scope="col" style="min-width: 100px"><h6 class="text-center m-0 p-1">Unit Price</h6></th>
                        <th scope="col" style="min-width: 130px"><h6 class="text-center m-0 p-1">Total Item Price</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->getOrderItem as $item)
                        <tr>
{{--                            <th scope="row">{{$loop->iteration}}</th>--}}
{{--                            @php $product = $item->getProduct()->withTrashed()->pluck('name')->first() @endphp--}}
{{--                            <td>{{$product}}</td>--}}
                            <td style="height: 53px"><h6 class="text-center">{{$item->quantity}}</h6></td>
                            <td style="height: 53px"><h6 class="text-center">{{$item->price}}</h6></td>
                            <td style="height: 53px"><h6 class="text-center">{{$item->total_price}}</h6></td>
                        </tr>
                    @endforeach
{{--                    <tr>--}}
{{--                        <td colspan="4">Total price</td>--}}
{{--                        <td>{{$order->total_price}}</td>--}}
{{--                    </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
