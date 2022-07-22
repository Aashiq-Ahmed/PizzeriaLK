@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-1 m-5 bg-light">
            <div class="container-fluid">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000" style="height: 600px">
                            <img src="{{ asset('/images/s1.avif') }}" class="d-block w-100" alt="Create Your Own Pizza">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white fw-bolder" style="font-size: x-large">Create Your Own Pizza</h5>
                                <p class="text-white fw-bolder" style="font-size: larger">The Pizzeria Specialty Pizza with
                                    Custom Toppings and Sizes.</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000" style="height: 600px">
                            <img src="{{ asset('/images/original.avif') }}" class="d-block w-100" alt="Original">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white fw-bolder" style="font-size: x-large">Original</h5>
                                <p class="text-white fw-bolder" style="font-size: larger">An Original Pizza with a signature
                                    tomato sauce and cheese.</p>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 600px">
                            <img src="{{ asset('/images/gimme.avif') }}" class="d-block w-100" alt="Gimme the Meat">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white fw-bolder" style="font-size: x-large">Gimme the Meat</h5>
                                <p class="text-white fw-bolder" style="font-size: larger">A Meaty Pizza with Pepperoni, Ham,
                                    Chicken, Minced Beef, Sausage & Bacon.</p>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 600px">
                            <img src="{{ asset('/images/veg.avif') }}" class="d-block w-100" alt="Veggie Delight">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white fw-bolder" style="font-size: x-large">Veggie Delight</h5>
                                <p class="text-white fw-bolder" style="font-size: larger">For Veggie Lovers a Veggie Pizza
                                    with a Onions, Green Peppers, Mushrooms & Sweetcorn.</p>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 600px">
                            <img src="{{ asset('/images/hot.webp') }}" class="d-block w-100" alt="Make Mine Hot">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white fw-bolder" style="font-size: x-large">Make Mine Hot</h5>
                                <p class="text-white fw-bolder" style="font-size: larger">An Hot Pizza with Chicken, Onions,
                                    Green Peppers & Jalapeno Peppers.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


                <div class="container mt-5 mb-5">
                    <div class="d-flex justify-content-center row">

                        {{-- <div class="card w-100 mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Button</a>
                                </div>
                            </div> --}}
                        <div class="row">
                            @if ($products && $products->count())
                                @foreach ($products as $product)
                                    <div class="row p-2 bg-white border rounded mt-2">
                                        <h4>{{ $product->pizza_size }}</h4>
                                        <div class="col-md-3 mt-1">
                                            <img src="{{ $product->image }}"
                                                class="img-fluid img-responsive rounded product-image" alt="Product Image">
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <h5>{{ $product->name }}</h5>
                                            <div class="d-flex flex-row">

                                            </div>

                                            <p class="text-justify para mb-0">
                                                {{ $product->description }}
                                            </p>
                                            <br>
                                            <p class="text-justify para mb-0">
                                                Size:
                                                <strong>{{ $product->pizza_size }}</strong>
                                            </p>
                                        </div>
                                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                            <div class="d-flex flex-row align-items-center">
                                                <h4 class="mr-1">£ {{ number_format($product->price, 2) }}</h4>
                                            </div>

                                            @auth
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf

                                                    @if ($product->size->toppings)
                                                        <ul>
                                                            @foreach ($product->size->toppings as $topping)
                                                                <li>
                                                                    <input type="checkbox" name="toppings[]"
                                                                        value="{{ $topping->id }}">
                                                                    {{ $topping->name }}
                                                                    £ {{ number_format($topping->price, 2) }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="number" name="quantity" value="1" />
                                                    <button type="submit" class="btn btn-primary btn-lg mt-4">
                                                        Add To Cart
                                                    </button>
                                                </form>
                                            @endauth

                                            @guest
                                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-4">
                                                    Login to Buy
                                                </a>
                                            @endguest
                                            <div class="d-flex flex-column mt-4 text-center">

                                                @if ($product->is_available = 1)
                                                    <span>Status: </span>
                                                    <strong>Available</strong>
                                                @else
                                                    <span>Status: </span>
                                                    <strong>Not Available</strong>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
