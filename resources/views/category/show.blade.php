@extends('layout.mainlayout')
@section('title')Category: {{$category->name}}@endsection
@section('content')
    <div class="container">
    <h1>Category Detail</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>
                <button class="btn btn-info"><a href="{{route('categories.edit',['categories'=>$category->slug])}}">Edit</a></button>
                <form action="{{route('categories.destroy',['categories'=>$category->slug])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
    <div>
        <h2>Description:</h2>
        <div class="jumbotron">{{$category->description}}</div>
    </div>
    </div>
@endsection
