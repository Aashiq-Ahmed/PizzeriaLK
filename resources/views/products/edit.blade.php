@extends('layouts.app')

@section('content')
    <div class="container">

        <form class="row g-3" method="POST" action="{{ route('products.update', $product->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="shadow p-3 mb-5 bg-body rounded">
                <h4 class="fw-bolder">Edit the Products</h4>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="form-label">Pizza Name</label>
                                    <input type="text" value="{{ old('name', $product->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="name" name="name" />
                                </div>

                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" value="{{ old('description', $product->description) }}"
                                        class="form-control @error('description') is-invalid @enderror" id="description"
                                        name="description" />
                                </div>

                                <div class="form-group">
                                    <label for="pizza_size" class="form-label">Size</label>
                                    <input type="text" value="{{ old('pizza_size', $product->pizza_size) }}"
                                        class="form-control @error('pizza_size') is-invalid @enderror" id="pizza_size"
                                        name="pizza_size" />
                                </div>

                                <div class="form-group">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" value="{{ old('price', $product->price) }}"
                                        class="form-control @error('price') is-invalid @enderror" id="price" name="price" />
                                </div>

                                <div class="form-group">
                                    <label for="is_available" class="form-label">Status</label>
                                    <input type="text" value="{{ old('is_available', $product->is_available ? 'Available' : 'Not Available') }}"
                                        class="form-control @error('is_available') is-invalid @enderror" id="is_available" name="is_available" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
