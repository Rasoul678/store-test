@extends('site.app')
@section('title','Order')
@section('content')
    @include('flash::message')
    <div class="container">
        <h3 class="text-center mt-5">Order List</h3>
        <section class="mt-4 pr-md-5 pl-md-5">
            @forelse($order as $item)
                <div class="card mb-2 mr-md-5 ml-md-5">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-4 col-md-4">
                                @php
                                    switch ($item->status->description)
                                    {
                                        case 'completed':
                                            $color = 'bg-success';
                                            break;
                                        case 'cancelled';
                                            $color = 'bg-danger';
                                            break;
                                        default:
                                            $color = 'bg-warning';
                                    }
                                @endphp
                                <h5 class="text-center mt-1">
                                    <span class="d-none d-lg-inline-block">Status: </span>
                                    <span class="{{ $color }} p-1 rounded text-center">{{$item->status->description}}</span>
                                </h5>
                            </div>
                            <div class="col-6 col-md-4">
                                <h6 class="card-title mt-1 text-center">Date{{$item->created_at->format('d/m/Y')}}</h6>
                            </div>
                            <div class="col-2 col-md-4 text-right">
                                <a href="{{route('order.show',['order'=>$item->id])}}" ><i class="material-icons">visibility</i></a>
                            </div>
                        </div>
                    </div>
                </div>
                    @empty
                        <p>There are not any orders submitted yet!</p>
            @endforelse
        </section>
{{--        <table class="table">--}}
{{--            <thead class="thead-dark">--}}
{{--            <tr>--}}
{{--                <th scope="col" class="text-center">Date</th>--}}
{{--                <th scope="col" class="text-center">Status</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @forelse($order as $item)--}}
{{--                <tr>--}}
{{--                    <td scope="row" class="text-center"><a class="btn" href="{{route('order.show',['order'=>$item->id])}}">{{$item->created_at}}</a></td>--}}
{{--                    <td class="text-center">{{$item->status->description}}</td>--}}
{{--                    @empty--}}
{{--                        <p>There are not any orders submitted yet!</p>--}}
{{--                </tr>--}}
{{--            @endforelse--}}
{{--            </tbody>--}}
{{--        </table>--}}
    </div>
@endsection
