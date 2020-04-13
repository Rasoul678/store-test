@extends('admin.app')
@section('title', 'Orders')
@section('page-title') <i class="fa fa-truck"></i> Orders @endsection
@section('content')
    <div class="d-flex justify-content-center" style="min-height: 407px">
        <table class="table table-hover table-sm mt-3" style="max-width: 120px">
            <thead class="thead-dark">
            <tr>
                <th scope="col"><h6 class="text-center m-0 p-1">Customer</h6></th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $item)
                <tr>
                    <th scope="row" style="height: 38px"><h6 class="text-center text-truncate m-0" style="max-width: 120px">{{$item->getUser->getFullNameAttribute()}}</h6></th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="table-responsive mt-3">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"><h6 class="text-center m-0 p-1" style="min-width: 220px">Date</h6></th>
                    <th scope="col"><h6 class="text-center m-0 p-1">Status</h6></th>
                    <th scope="col"><h6 class="text-center m-0 p-1" style="min-width: 80px">Total Price</h6></th>
                    <th scope="col"><h6 class="text-center m-0 p-1">Actions</h6></th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $item)
                    <tr>
                        <td><h6 class="text-center">{{$item->created_at->format('Y M d, h:i:s')}}</h6></td>
                        <td ><h6 class="text-center">{{$item->status->description}}</h6></td>
                        <td ><h6 class="text-center">{{$item->total_price}}</h6></td>
                        <td class="text-center">
                            <a href="{{route('admin.orders.show',['order'=>$item->id])}}"><i class="material-icons">visibility</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $order->links('pagination.default')}}
@endsection
