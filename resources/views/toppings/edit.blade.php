@extends('layouts.app')

@section('content')
    <div class="container">

        <form class="row g-3" method="POST" action="{{ route('toppings.update', $topping->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="shadow p-3 mb-5 bg-body rounded">
                <h4 class="fw-bolder">Edit the Toppings</h4>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">

                                {{-- $table->id();

                                $table->bigInteger('size_id')->unsigned();
                                $table->foreign('size_id')->references('id')->on('sizes');

                                $table->string('name')->nullable(); // varchar 255

                                $table->longText('topping')->nullable(); // text

                                $table->float('price')->nullable(); // text

                                $table->boolean('is_available')->default(true); // tinyint 2 - 0 or 1

                                $table->timestamps(); --}}

                                {{-- <th scope="col">Pizza Item ID</th>
                                <th scope="col">Topping Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Availability</th> --}}
                                <div class="form-group">

                                    <label for="name" class="form-label">Topping Name</label>
                                    <input type="text" value="{{ old('name', $topping->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="name" name="name" />
                                </div>

                                <div class="form-group">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" value="{{ old('price', $topping->price) }}"
                                        class="form-control @error('price') is-invalid @enderror" id="price" name="price" />
                                </div>
                                <div class="form-group">
                                    <label for="is_available" class="form-label">Availability</label>
                                    <input type="text"
                                        value="{{ old('is_available', $topping->is_available ? 'Available' : 'Not Available') }}"
                                        class="form-control @error('is_available') is-invalid @enderror" id="is_available"
                                        name="is_available" />
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
