@extends('admin.app')
@section('title', 'Cities')
@section('page-title') <i class="fa fa-map-marker"></i> Cities @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="mt-1 col-xs-12 col-sm-4 col-md-5 col-lg-3 col-xl-2">
                <a href="{{route('admin.cities.create')}}" class="btn btn-info btn-block" role="button">
                    Add City
                </a>
            </div>
        </div>
        <div class="table-responsive-lg mt-3" style="min-height: 350px">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Country</th>
                    <th class="text-center" scope="col" style="min-width: 120px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <th scope="row">{{ $city->city }}</th>
                        <th scope="row">{{ $city->state }}</th>
                        <th scope="row">{{ $city->country }}</th>
                        <td class="row justify-content-center" style="min-width: 220px">
                            <form class="mr-1"
                                  action="{{ route('admin.cities.show', ['city'=>$city->id]) }}"
                                  method="GET">@csrf
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Details
                                </button>
                            </form>
                            <form class="mr-1"
                                  action="{{ route('admin.cities.edit', ['city'=>$city->id]) }}"
                                  method="GET">@csrf
                                <button class="btn btn-secondary btn-sm" type="submit">
                                    Edit
                                </button>
                            </form>
                            <form class="mr-1"
                                  action="{{ route('admin.cities.destroy', ['city'=>$city->id]) }}"
                                  method="POST">@method('DELETE')@csrf
                                <button class="btn btn-danger btn-sm" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$cities->links()}}
    </div>
@endsection
