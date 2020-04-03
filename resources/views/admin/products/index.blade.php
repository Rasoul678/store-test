@extends('admin.app')
@section('title') Products @endsection
@section('content')
    <div class="container-fluid mt-4">
        <h1 class="mt-2 text-center"> Products</h1>
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('admin.products.create')}}" class="btn btn-primary btn-lg" role="button">Add product</a>
                <a href="{{route('admin.products.index',['only_trash'])}}" class="btn btn-warning btn-lg" role="button">Trash</a>
            </div>
        </div>
        <div class="mt-4">
            <div>
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th><h4> #</h4></th>
                        <th><h4>Name</h4></th>
                        <th><h4>Type</h4></th>
                        <th><h4>Price</h4></th>
                        <th class="text-center"><h4>Categories</h4></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td><h5>{{ $loop->iteration }}</h5></td>
                            <td>
                                <h5>
                                    <a href="{{route('admin.products.show',['product'=>$product->id])}}">{{ $product->name }}</a>
                                </h5>
                            </td>
                            <td><h5>{{ $product->type }}</h5></td>
                            <td><h5>R {{ $product->price }}</h5></td>
                            <td>
                                @foreach($product->getCategories as $category)
                                    <h5><span class="badge badge-dark">{{ $category->name }}</span></h5>
                                @endforeach
                            </td>
                            <td>
                                <div class="form-inline float-right">
                                    @if(!$product->deleted_at)
                                        <form action="{{ route('admin.products.edit', ['product'=>$product->id]) }}"
                                              method="get">@csrf
                                            <button class="btn btn-success btn-sm" type="submit"><i
                                                    class="material-icons">edit</i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.products.delete', ['product'=>$product->id]) }}"
                                              method="post">@method('DELETE')@csrf
                                            <button class="btn btn-warning btn-sm m-2" type="submit"><i
                                                    class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    @else
                                        <form
                                            action="{{ route('admin.products.restore', ['product_id'=>$product->id]) }}"
                                            method="post">@csrf
                                            <button class="btn btn-primary btn-sm" type="submit"><i
                                                    class="material-icons">restore</i>
                                            </button>
                                        </form>
                                    @endif
                                    <form
                                        action="{{ route('admin.products.forceDelete', ['product_id'=>$product->id]) }}"
                                        method="post">@method('DELETE')@csrf
                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="material-icons">delete_forever</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @empty
                                <p>There are not any products added yet!</p>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{ $products->links()}}
    </div>
@endsection
