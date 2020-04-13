@extends('admin.app')
@section('title', 'Cities')
@section('page-title') <i class="fa fa-map-marker"></i> Cities @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="mt-1 col-xs-12 col-sm-4 col-md-5 col-lg-3 col-xl-2">
                <a href="{{route('admin.cities.create')}}" class="btn btn-primary btn-lg btn-block" role="button">Add
                    City</a>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-2 mb-sm-0" style="min-height: 383px">
            <table class="table table-hover table-sm mt-3" style="max-width: 120px">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"><h6 class="text-center m-0 mr-lg-5 ml-lg-5 p-1">City</h6></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <th scope="row" style="height: 53px"><h6 class="text-center text-truncate m-0" style="max-width: 120px">{{ $city->city }}</h6></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="table-responsive mt-3">
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><h6 class="text-center m-0 mr-lg-5 ml-lg-5  p-1">State</h6></th>
                        <th scope="col"><h6 class="text-center m-0 mr-lg-5 ml-lg-5  p-1">Country</h6></th>
                        <th scope="col"><h6 class="text-center m-0 p-1">Actions</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cities as $city)
                        <tr>
                            <td><h5 class="text-center">{{ $city->state }}</h5></td>
                            <td><h5 class="text-center">{{ $city->country }}</h5></td>
                            <td class="d-flex justify-content-center mr-0">
                                <form class="mr-1"
                                        action="{{ route('admin.cities.show', ['city'=>$city->id]) }}"
                                        method="GET">@csrf
                                    <button class="btn btn-info btn-sm" type="submit"><i
                                                class="material-icons">visibility</i>
                                    </button>
                                </form>
                                <form class="mr-1"
                                        action="{{ route('admin.cities.edit', ['city'=>$city->id]) }}"
                                        method="GET">@csrf
                                    <button class="btn btn-success btn-sm" type="submit"><i
                                                class="material-icons">edit</i>
                                    </button>
                                </form>
                                <form class="mr-1"
                                        action="{{ route('admin.cities.destroy', ['city'=>$city->id]) }}"
                                        method="POST">@method('DELETE')@csrf
                                    <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="material-icons">delete_forever</i>
                                    </button>
                                </form>
                            </td>
                            @empty
                                <td><h5>There aren't any cities added yet.</h5></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{$cities->links()}}
    </div>
@endsection
