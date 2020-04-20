@extends('admin.app')
@section('title', 'Orders')
@section('page-title') <i class="fa fa-truck"></i> Orders @endsection
@section('content')
    <div class="table-responsive-lg" style="min-height: 410px">
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">Status</th>
                <th scope="col" style="min-width: 120px">Date</th>
                <th scope="col" style="min-width: 100px">Total price</th>
                <th class="text-center" scope="col" style="min-width: 100px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th scope="row" class="text-truncate">{{$item->getUser->getFullNameAttribute()}}</th>
                    <th scope="row">{{$item->status->description}}</th>
                    <th scope="row">{{$item->created_at->format('d M Y')}}</th>
                    <th scope="row">${{$item->total_price}}</th>
                    <td class="row justify-content-center">
                        <a class="btn btn-primary py-0" role="button" href="{{route('admin.orders.show',['order'=>$item->id])}}">
                            Details
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $order->links()}}
@endsection
