@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <h1>Checkout</h1>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">

                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span>Promotions</span>
                    </h4>

                    {{-- Promotions --}}
                    <form method="post" action="{{ route('cart.order.update', [$cart->id, $order->id]) }}">
                        <div class="col-md-12">
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif

                            @if (session()->has('promotion_success'))
                                <div class="alert alert-success">
                                    {{ session()->get('promotion_success') }}
                                </div>
                            @endif
                        </div>
                        @csrf
                        <ul class="list-group mb-3">
                            @foreach ($promotions as $promotion)
                                @if ($promotion->id == 1 || $promotion->id == 9 || $promotion->id == 13 || $promotion->id == 17 || $promotion->id == 21 || $promotion->id == 25)
                                    <li
                                        class="list-group-item d-flex justify-content-between lh-condensed {{ $order->promotion_id == $promotion->id ? 'bg-warning' : '' }}">
                                        <div>
                                            <h6 class="my-0">{{ $promotion->name }}</h6>
                                            <small class="text-muted">{{ $promotion->description }}</small>
                                        </div>
                                        <button type="submit" name="promotion_id" value="{{ $promotion->id }}"
                                            class="btn btn-sm btn-info text-white">Apply</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </form>

                    <div class="p-3">
                        <h4 class="d-flex justify-content-between align-items-center mb-3 mt-4">Delivery Method</h4>
                        <select class="form-control @error('delivery_type') is-invalid @enderror" id="delivery_type"
                            name="delivery_type">
                            {{-- $table->enum('delivery_type', ['Collection', 'Delivery']); --}}
                            @foreach (['Collection', 'Delivery'] as $value)
                                <option value="{{ $value }}"
                                    {{ old('delivery_type', $order->delivery_type) == $value ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h4 class="d-flex justify-content-between align-items-center mb-3 mt-4">
                        <span">Your cart</span>
                            <span class="badge badge-secondary badge-pill">3</span>
                    </h4>

                    <ul class="list-group mb-3">
                        @if ($cart->products && $cart->products->count())
                            @foreach ($cart->products as $product)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $product->name }} - {{ $product->pizza_size }} x
                                            {{ $product->pivot->quantity }}</h6>
                                        <small class="text-muted">
                                            @if ($product->pivot->toppings)
                                                Pizza Toppings Selected
                                                <ul>
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
                                        </small>
                                    </div>
                                    <span class="text-muted">£{{ number_format($product->pivot->total, 2) }}</span>
                                </li>
                            @endforeach
                        @endif

                        @if ($order->discount)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Sub Total (£)</span>
                                <strong>${{ number_format($cart->total, 2) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Discount (£)</span>
                                <strong>${{ number_format($order->discount, 2) }}</strong>
                            </li>
                        @endif

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (£)</span>
                            <strong>${{ number_format($order->total, 2) }}</strong>
                        </li>
                    </ul>


                </div>
                <div class="col-md-8 order-md-1">
                    <form class="bg- hite p-1 rounded" method="POST"
                        action="{{ route('cart.thank-you', [$cart->id, $order->id]) }}">
                        @csrf

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Customer Information</h5>
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-12 pt-3">
                                            <label for="title" class="form-label">Title</label>
                                            <select class="form-select @error('title') is-invalid @enderror" id="title"
                                                name="title">
                                                <option value="">Select</option>
                                                @foreach (['mr', 'mrs', 'miss', 'dr', 'prof', 'etc'] as $title)
                                                    <option value="{{ $title }}"
                                                        {{ old('title', $user->title) == $title ? 'selected' : '' }}>
                                                        {{ ucfirst($title) }}.
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                        <div class="col-6">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" value="{{ old('name', $user->name) }}"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                name="name" />
                                            <div id="Help" class="form-text">User Full Name</div>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                        <div class="col-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <div class="form-check">
                                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                                    type="radio" name="gender" id="gender-male" value="male"
                                                    {{ old('gender', $user->gender) == 'male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender-male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                                    type="radio" name="gender" id="gender-female" value="female"
                                                    {{ old('gender', $user->gender) == 'female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender-female">
                                                    Female
                                                </label>
                                                @error('gender')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                                    type="radio" name="gender" id="gender-others" value="others"
                                                    {{ old('gender', $user->gender) == 'others' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender-others">
                                                    Others
                                                </label>
                                                @error('gender')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input type="date" class="form-control" id="birthday" name="birthday"
                                                value="{{ old('birthday', $user->birthday) }}" />
                                            <div id="Help" class="form-text"></div>
                                        </div>

                                        <div class="col mt-3">
                                            <label for="landmark" class="form-label">Land Marks</label>
                                            <textarea class="form-control" id="landmark" name="landmark">{!! old('landmark', $user->landmark) !!}</textarea>
                                            <div id="landmarkHelp" class="form-text">Land Marks to the Delivery Address
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title">Address</h5>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="address" class="form-label">Delivery Address</label>
                                        <input type="text" value="{{ old('address', $user->address) }}"
                                            class="form-control @error('address') is-invalid @enderror" id="address"
                                            name="address" />
                                        <div id="Help" class="form-text">Delivery Address</div>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="col-6">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" value="{{ old('city', $user->city) }}"
                                            class="form-control @error('city') is-invalid @enderror" id="city"
                                            name="city" />
                                        <div id="cityHelp" class="form-text">User City include Postal Code</div>
                                        @error('city')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" name="county" id="county" value="LK">

                                <div class="row pt-3">
                                    <div class="col-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" value="{{ old('phone', $user->phone) }}"
                                            class="form-control" id="phone" name="phone" />
                                        <div id="phoneHelp" class="form-text"></div>
                                    </div>
                                </div>

                            </div>

                            <hr class="mb-4">

                            <div class="p-3">
                                <h4 class="mb-3">Payment</h4>

                                <div class="d-block my-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pay" id="onlinepay" checked>
                                        <label class="form-check-label" for="onlinepay">Online Payment</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pay" id="codpay">
                                        <label class="form-check-label" for="codpay">Cash on Delivery</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-name">Name on card</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="">
                                        <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-number">Credit card number</label>
                                        <input type="text" class="form-control" id="cc-number" placeholder="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">Expiration</label>
                                        <input type="text" class="form-control" id="cc-expiration" placeholder="">
                                        <div class="invalid-feedback">
                                            Expiration date required
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" placeholder="">
                                        <div class="invalid-feedback">
                                            Security code required
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="mb-4">
                            <br>
                            <button class="btn btn-primary btn-lg btn-block m-5" type="submit">Complete Order</button>
                            <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
