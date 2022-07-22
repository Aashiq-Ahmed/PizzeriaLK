@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table bg-white table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pizza Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Size</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->pizza_size }}</td>
                                <td>£ {{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->is_available ? 'Available' : 'Not Available' }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-success">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            id="delete-{{ $product->id }}-product" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirm('Are you sure you want to delete?') ? document.getElementById('delete-{{ $product->id }}-product').submit() : null">
                                                Delete
                                            </button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
