@extends('admin.app')
@section('title') Roles @endsection
@section('content')
    <div class="container-fluid mt-4">
        <h1 class="mt-2 text-center"> Cities</h1>
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('admin.cities.create')}}" class="btn btn-primary btn-lg" role="button">Add City</a>
            </div>
        </div>
        <div class="mt-4">
            <div>
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th><h4> #</h4></th>
                        <th><h4>City</h4></th>
                        <th><h4>State</h4></th>
                        <th><h4>Country</h4></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cities as $city)
                        <tr>
                            <td><h5>{{ $loop->iteration }}</h5></td>
                            <td><h5>{{ $city->city }}</h5></td>
                            <td><h5>{{ $city->state }}</h5></td>
                            <td><h5>{{ $city->country }}</h5></td>
                            <td>
                                <div class="row justify-content-center">
{{--                                    <form--}}
{{--                                        action="{{ route('admin.cities.show', ['city'=>$city->id]) }}"--}}
{{--                                        method="GET">@csrf--}}
{{--                                        <button class="btn btn-info btn-sm" type="submit"><i--}}
{{--                                                class="material-icons">visibility</i>--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
                                    <form
                                        action="{{ route('admin.cities.edit', ['city'=>$city->id]) }}"
                                        method="GET">@csrf
                                        <button class="btn btn-success btn-sm" type="submit"><i
                                                class="material-icons">edit</i>
                                        </button>
                                    </form>
                                    <form
                                        action="{{ route('admin.cities.destroy', ['city'=>$city->id]) }}"
                                        method="POST">@method('DELETE')@csrf
                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="material-icons">delete_forever</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @empty
                                <td><h5>There aren't any cities added yet.</h5></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
