@extends('admin.app')
@section('title') Products List @endsection
@section('content')

    <div class="container mt-5">
        <h1 class="mt-5 rounded-pill bg-dark text-center p-3 text-light"> Products</h1>
        <div class="mt-5">
            <a href="{{route('admin.products.create')}}" class="btn btn-primary btn-lg" role="button">Add product</a>
        </div>
        <div class="mt-3">
            <div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th><h4> #</h4></th>
                        <th> <h4>Name</h4></th>
                        <th> <h4>Type</h4></th>
                        <th> <h4>Price</h4></th>
                        <th class="text-center"> <h4>Categories</h4></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td><h5>{{ $loop->iteration }}</h5></td>
                            <td>
                                <h5><a href="{{route('admin.products.show',['product'=>$product->id])}}">{{ $product->name }}</a></h5>
                            </td>
                            <td><h5>{{ $product->type }}</h5></td>
                            <td><h5>R {{ $product->price }}</h5></td>
                            <td>
                                @foreach($product->getCategories as $category)
                                    <h5><span class="badge badge-dark">{{ $category->name }}</span></h5>
                                @endforeach
                            </td>
                            <td>
                                <div class="form-inline">
                                    <form action="{{ route('admin.products.edit', ['product'=>$product->id]) }}"
                                          method="get">@csrf
                                        <button class="btn btn-success btn-sm" type="submit"><i class="material-icons">edit</i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.products.delete', ['product'=>$product->id]) }}"
                                          method="post">@method('DELETE')@csrf
                                        <button class="btn btn-warning btn-sm m-2" type="submit"><i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.products.forceDelete', ['product'=>$product->id]) }}"
                                          method="post">@method('DELETE')@csrf
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="material-icons">delete_forever</i>
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
    </div>
@endsection
