@extends('admin.app')
@section('title') Products List @endsection
@section('content')

    <div class="container mt-2">
        <div>
            <a href="{{route('admin.products.create')}}" class="btn btn-primary" role="button">Add product</a>
        </div>
        <div class="mt-3">
            <h2>Products</h2>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th> Name</th>
                        <th> Type</th>
                        <th> Price</th>
                        <th class="text-center"> Categories</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{route('admin.products.show',['product'=>$product->id])}}">{{ $product->name }}</a>
                            </td>
                            <td>{{ $product->type }}</td>
                            <td>R {{ $product->price }}</td>
                            <td>
                                @foreach($product->getCategories as $category)
                                    <span class="badge badge-primary">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="form-inline">
                                    <form action="{{ route('admin.products.edit', ['product'=>$product->id]) }}"
                                          method="get">@csrf
                                        <button class="btn btn-warning" type="submit"><i class="material-icons">edit</i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.products.delete', ['product'=>$product->id]) }}"
                                          method="post">@method('DELETE')@csrf
                                        <button class="btn btn-danger" type="submit"><i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.products.forceDelete', ['product'=>$product->id]) }}"
                                          method="post">@method('DELETE')@csrf
                                        <button class="btn btn-danger" type="submit"><i class="material-icons">delete_forever</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @empty
                                <p>The are not any products added yet!</p>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
