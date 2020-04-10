@extends('admin.app')
@section('title') Roles @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-map-marker"></i> Cities</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container">
        <div class="row">
            <div class="mt-1 col-xs-12 col-sm-4 col-md-5 col-lg-3 col-xl-2">
                <a href="{{route('admin.cities.create')}}" class="btn btn-primary btn-lg btn-block" role="button">Add
                    City</a>
            </div>
        </div>
        <div class="table-responsive-xl mt-3">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"><h4 class="text-center">City</h4></th>
                    <th scope="col"><h4 class="text-center">State</h4></th>
                    <th scope="col"><h4 class="text-center">Country</h4></th>
                    <th scope="col"><h4 class="text-center">Actions</h4></th>
                </tr>
                </thead>
                <tbody>
                @forelse($cities as $city)
                    <tr>
                        <td scope="row"><h5 class="text-center">{{ $loop->iteration }}</h5></td>
                        <td><h5 class="text-center">{{ $city->city }}</h5></td>
                        <td><h5 class="text-center">{{ $city->state }}</h5></td>
                        <td><h5 class="text-center">{{ $city->country }}</h5></td>
                        <td>
                            <div class="row justify-content-center">
                                <div class="col-xs-3 mr-1 mb-1">
                                    <form
                                        action="{{ route('admin.cities.show', ['city'=>$city->id]) }}"
                                        method="GET">@csrf
                                        <button class="btn btn-info btn-sm" type="submit"><i
                                                class="material-icons">visibility</i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-xs-3 mr-1 mb-1">
                                    <form
                                        action="{{ route('admin.cities.edit', ['city'=>$city->id]) }}"
                                        method="GET">@csrf
                                        <button class="btn btn-success btn-sm" type="submit"><i
                                                class="material-icons">edit</i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-xs-3 mr-1 mb-1">
                                    <form
                                        action="{{ route('admin.cities.destroy', ['city'=>$city->id]) }}"
                                        method="POST">@method('DELETE')@csrf
                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="material-icons">delete_forever</i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        @empty
                            <td><h5>There aren't any cities added yet.</h5></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{$cities->links()}}
    </div>
@endsection
