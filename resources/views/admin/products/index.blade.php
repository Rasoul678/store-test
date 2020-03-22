@extends('admin.app')
@section('title') Products List @endsection
@section('content')

    <div class="container mt-5">
        <div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary" role="button">Add Product</a>
        </div>
        <div class="mt-5">
            <h2>Products</h2>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th> SKU </th>
                        <th> Name </th>
                        <th class="text-center"> Categories </th>
                        <th class="text-center"> Price </th>
                        <th class="text-center"> Status </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @foreach($product->categories as $category)
                                    <span class="badge badge-primary">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td>$ {{ $product->price }}</td>
                            <td>
                                @if ($product->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Not Active</span>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning" role="button"><i class="material-icons">edit</i></a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('admin.products.delete', $product->id) }}" class="btn btn-danger" role="button"><i class="material-icons">delete_forever</i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
