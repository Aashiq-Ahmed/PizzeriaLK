@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <h1>My Cart - #{{ $cart->id }}</h1>
        </div>

        <div class="container">
            <div class="row">
                @if ($cart->products && $cart->products->count())
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->products as $product)
                                    <tr>
                                        <td class="col-sm-8 col-md-6">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4>{{ $product->name }}</h4>
                                                    <h5>{{ $product->description }}</h5>
                                                    <strong>{{ $product->pizza_size }}</strong><br>

                                                    @if ($product->pivot->toppings)
                                                        Pizza Toppings
                                                        <ul>
                                                            @foreach (json_decode($product->pivot->toppings) as $topping)
                                                                <li>
                                                                    {{ \App\Models\Topping::find($topping)->name }}
                                                                    £
                                                                    {{ number_format(\App\Models\Topping::find($topping)->price, 2) }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                    @if ($product->is_available = 1)
                                                        <span>Status: </span>
                                                        <strong>Available</strong>
                                                    @else
                                                        <span>Status: </span>
                                                        <strong>Not Available</strong>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 col-md-1" style="text-align: center">
                                            <form action="{{ route('cart.update', $cart->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                    <strong>{{ $product->pivot->quantity }} Pcs.</strong>
                                            </form>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>£
                                                {{ number_format($product->pivot->price, 2) }}</strong></td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>£
                                                {{ number_format($product->pivot->total, 2) }}</strong></td>
                                        <td class="col-sm-1 col-md-1">
                                            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST"
                                                id="delete-{{ $product->id }}-product" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirm('Are you sure you want to remove {{ $product->name }} ?') ? document.getElementById('delete-{{ $product->id }}-product').submit() : null">
                                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-end">
                                        <h3>Total</h3>
                                    </td>
                                    <td class="text-end" colspan="2">
                                        <h3><strong>£ {{ number_format($cart->total, 2) }}</strong></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end">
                                        <a href="{{ route('cart.checkout', $cart->id) }}" class="btn btn-success btn-lg">
                                            Checkout
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <h3>Please serve yourself with an amazing Pizza first!</h3>
                    <br>
                    <a href="/" class="btn btn-primary btn-lg">Navigate to Home</a>
                @endif
            </div>
        </div>
    </div>
@endsection
