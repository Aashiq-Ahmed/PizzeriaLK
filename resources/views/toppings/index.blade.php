@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <strong>Toppings are applied only to Create Your Own Pizza</strong>
                    <br>
                    <ul>
                        <li><strong>Small   -> Create Your Own -> ID = 13</strong><br></li>
                        <li><strong>Medium  -> Create Your Own -> ID = 14</strong><br></li>
                        <li><strong>Large   -> Create Your Own -> ID = 15</strong><br></li>
                    </ul>
                </div>
                <table class="table bg-white table-striped">
                    <thead>
                        <tr>
                            {{-- 'size_id',
                            'name',
                            'topping',
                            'price',
                            'is_available', --}}
                            <th scope="col">Pizza Item ID</th>
                            <th scope="col">Topping Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Actions</th>
                            {{-- <th scope="col">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($toppings as $topping)
                            <tr>
                                <th scope="row">{{ $topping->size_id }}</th>
                                <td>{{ $topping->name }}</td>
                                <td>£ {{ number_format($topping->price, 2) }}</td>
                                <td>{{ $topping->is_available ? 'Available' : 'Not Available' }}</td>
                                <td>
                                    <a href="{{ route('toppings.edit', $topping->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('toppings.destroy', $topping->id) }}" method="POST"
                                            id="delete-{{ $topping->id }}-topping" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirm('Are you sure you want to delete?') ? document.getElementById('delete-{{ $topping->id }}-topping').submit() : null">
                                                Delete
                                            </button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $toppings->links() }}
            </div>
        </div>
    </div>
@endsection
