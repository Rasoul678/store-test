@extends('admin.app')
@section('title') Products @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Products</h1>
        </div>
    </div>
    @include('flash::message')
    <div class="container">
        <div class="row">
            <div class="mt-1 col-xs-12 col-sm-4 col-md-5 col-lg-3 col-xl-2">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-lg btn-block" role="button">Add
                    Product</a>

            </div>
            <div class="mt-1 col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2">
                <a href="{{ route('admin.products.index',['only_trash']) }}" class="btn btn-warning btn-lg btn-block" role="button">Trash</a>
            </div>
        </div>
        <div class="table-responsive-xl mt-3">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"><h4 class="text-center">Name</h4></th>
                    <th scope="col"><h4 class="text-center">Type</h4></th>
                    <th scope="col"><h4 class="text-center">Price</h4></th>
                    <th scope="col"><h4 class="text-center">Category</h4></th>
                    <th scope="col"><h4 class="text-center">Actions</h4></th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <th scope="row"><h5 class="text-center" >{{ $loop->iteration }}</h5></th>
                        <td><h5 class="text-center">{{ $product->name }}</h5></td>
                        <td><h5 class="text-center">{{ $product->type }}</h5></td>
                        <td><h5 class="text-center">$ {{ $product->price }}</h5></td>
                        <td>
                            @foreach($product->getCategories as $category)
                                <h5 class="text-center"><span class="badge badge-dark">{{ $category->name }}</span></h5>
                            @endforeach
                        </td>
                        <td>
                            <div class="row justify-content-center">
                                @if(!$product->deleted_at)
                                    <div class="col-xs-3 mr-1 mb-1">
                                        <form
                                                action="{{route('admin.products.show',['product'=>$product->id])}}"
                                                method="get">@csrf
                                            <button class="btn btn-info btn-sm" type="submit">
                                                <i class="material-icons">visibility</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-xs-3 mr-1 mb-1">
                                        <form
                                                action="{{ route('admin.products.edit', ['product'=>$product->id]) }}"
                                                method="get">@csrf
                                            <button class="btn btn-success btn-sm" type="submit">
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-xs-3 mr-1 mb-1">
                                        <form
                                                action="{{ route('admin.products.delete', ['product'=>$product->id]) }}"
                                                method="post">@method('DELETE')@csrf
                                            <button class="btn btn-warning btn-sm" type="submit">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="col-xs-3 mr-1 mb-1">
                                        <form
                                                action="{{ route('admin.products.restore', ['product_id'=>$product->id]) }}"
                                                method="post">@csrf
                                            <button class="btn btn-primary btn-sm" type="submit">
                                                <i class="material-icons">restore</i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                <div class="col-xs-3 mr-1 mb-1">
                                    <form
                                            action="{{ route('admin.products.forceDelete', ['product_id'=>$product->id]) }}"
                                            method="post">@method('DELETE')@csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        @empty
                            <p>There are not any products added yet!</p>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $products->links()}}
    </div>
@endsection
