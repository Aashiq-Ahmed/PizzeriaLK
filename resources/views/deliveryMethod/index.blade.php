@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table bg-white table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Delivery Type</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveryMethods as $deliveryMethod)
                            <tr>
                                <th scope="row">{{ $deliveryMethod->id }}</th>
                                <td>{{ $deliveryMethod->description }}</td>
                                <td>{{ $deliveryMethod->is_active ? 'In Service' : 'Not In Service' }}</td>
                                <td><a href="{{-- {{ route('orders.edit', $order->id) }} --}}" class="btn btn-sm btn-info">
                                    Update
                                </a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
