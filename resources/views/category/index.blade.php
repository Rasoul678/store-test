@extends('layout.mainlayout')
@section('title','Category')
@section('content')
    <div class="container">
        <h1>Categories</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><a href="{{route('categories.show',['categories'=>$category->slug])}}">{{$category->name}}</a></td>
                    <td>{{$category->slug}}</td>
                    @empty
                        <p>There are not any categories added yet!</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
