@extends('layouts.app')
<?php date_default_timezone_set('Asia/Colombo'); ?>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table bg-white table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Date & Time</th>
                            <th scope="col">Customer User</th>
                            <th scope="col">Promotion</th>
                            <th scope="col">Status</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Delivery Method</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ ucfirst($order->updated_at) }}</td>
                                <td>{{ ucfirst($order->user->name) }}</td>
                                <td>{{ ucfirst($order->promotion ? $order->promotion->name : '-') }}</td>
                                <td>{{ ucfirst($order->status) }}</td>
                                <td>{{ ucfirst($order->payment_status) }}</td>
                                <td>{{ ucfirst($order->delivery_type) }}</td>
                                <td>£ {{ number_format($order->discount, 2) }}</td>
                                <td>£ {{ number_format($order->total, 2) }}</td>
                                <td>
                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-info">
                                        Update
                                    </a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                        id="delete-{{ $order->id }}-user" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirm('Are you sure you want to delete?') ? document.getElementById('delete-{{ $order->id }}-user').submit() : null">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <ul class="list-group mb-3">
                                        @foreach ($order->cart->products as $product)
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                Name : {{ $product->name }}<br>
                                                Quantity : {{ $product->pivot->quantity }} <br>
                                                Item Price : £{{ number_format($product->pivot->total, 2) }} <br>
                                                @if ($product->pivot->toppings)
                                                    <ul>
                                                        <strong>Toppings:</strong>
                                                        @foreach (json_decode($product->pivot->toppings) as $topping)
                                                            <li>
                                                                {{ \App\Models\Topping::find($topping)->name }}
                                                                £
                                                                {{ number_format(\App\Models\Topping::find($topping)->price, 2) }}
                                                                x
                                                                <strong>{{ $product->pivot->quantity }}</strong>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
