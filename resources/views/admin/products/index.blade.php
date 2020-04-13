@extends('admin.app')
@section('title', 'Products')
@section('page-title') <i class="fa fa-shopping-bag"></i> Products @endsection
@section('content')
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
        <div class="d-flex justify-content-center mb-2 mb-sm-0" style="min-height: 383px">
            <table class="table table-hover table-sm mt-3" style="max-width: 120px">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"><h6 class="text-center m-0 mr-lg-5 ml-lg-5 p-1">Name</h6></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row" style="height: 53px"><h6 class="text-center text-truncate m-0" style="max-width: 120px">{{ $product->name }}</h6></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="table-responsive mt-3">
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" ><h6 class="text-center m-0 mr-lg-5 ml-lg-5  p-1">Type</h6></th>
                        <th scope="col" ><h6 class="text-center m-0 mr-lg-5 ml-lg-5 p-1">Price</h6></th>
                        <th scope="col" ><h6 class="text-center m-0 mr-lg-5 ml-lg-5 p-1">Category</h6></th>
                        <th scope="col" ><h6 class="text-center m-0 p-1">Actions</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><h6 class="text-center">{{ $product->type }}</h6></td>
                            <td><h6 class="text-center">{{ $product->price }}</h6></td>
                            <td>
                                @foreach($product->getCategories as $category)
                                    <h5 class="text-center"><span class="badge badge-dark">{{ $category->name }}</span></h5>
                                @endforeach
                            </td>
                            <td class="d-flex justify-content-center mr-0" >
                                @if(!$product->deleted_at)
                                    <form class="mr-1"
                                            action="{{route('admin.products.show',['product'=>$product->id])}}"
                                            method="get">@csrf
                                        <button class="btn btn-info btn-sm" type="submit">
                                            <i class="material-icons">visibility</i>
                                        </button>
                                    </form>
                                    <form class="mr-1"
                                            action="{{ route('admin.products.edit', ['product'=>$product->id]) }}"
                                            method="get">@csrf
                                        <button class="btn btn-success btn-sm" type="submit">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </form>
                                    <form class="mr-1"
                                            action="{{ route('admin.products.delete', ['product'=>$product->id]) }}"
                                            method="post">@method('DELETE')@csrf
                                        <button class="btn btn-warning btn-sm" type="submit">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                @else
                                    <form class="mr-1"
                                            action="{{ route('admin.products.restore', ['product_id'=>$product->id]) }}"
                                            method="post">@csrf
                                        <button class="btn btn-primary btn-sm" type="submit">
                                            <i class="material-icons">restore</i>
                                        </button>
                                    </form>
                                @endif
                                    <form class="mr-1"
                                            action="{{ route('admin.products.forceDelete', ['product_id'=>$product->id]) }}"
                                            method="post">@method('DELETE')@csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $products->links('pagination.default')}}
    </div>
@endsection
