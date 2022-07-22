@extends('layouts.app')

@section('content')
    <div class="container">
        @can('AdminFunctions')
            <div class="row">
                <div class="col">
                    <a href="{{ route('products.index') }}" class="btn btn-primary mt-4 mb-4">
                        Back
                    </a>
                </div>
            </div>
        @endcan

        <div class="row">
            <div class="bg-white col p-4 rounded rounded-2 col-md-8">
                <div class="card">
                    @if ($product->image)
                        <img src="{{ $product->image }}" class="img-fluid img-responsive rounded product-image" width="600" height="600" alt="Product Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $product->name }}
                        </h5>
                        <p class="card-text">Description: {{ $product->description }}</p>
                        <p class="card-text"><strong>Size: {{ $product->pizza_size }}</strong></p>


                        <h4>£ {{ number_format($product->price, 2) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
