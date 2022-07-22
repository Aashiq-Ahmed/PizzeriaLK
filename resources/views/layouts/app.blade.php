<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Pizzeria</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- AlpineJS -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #E24414">
            <div class="container-fluid">
                <a class="navbar-brand fw-bolder text-white fs-3" href="{{ url('/') }}">
                    The Pizzeria
                </a>

                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @can('AdminFunctions')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Adminstration
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('products.index') }}">Products</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('toppings.index') }}">Pizza Toppings</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('orders.index') }}">Orders</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('deliveryMethods.index') }}">Delivery Methods</a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('orders.user_history') }}">My Orders</a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @can('CustomerFunctions')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Customer
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('orders.user_history') }}">My Orders</a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        @if (session('cart_id'))
                            <li>
                                <a class="nav-link" href="{{ route('cart.show', session()->get('cart_id')) }}">
                                    <i class="ri-shopping-cart-line"></i> My Cart
                                    <span class="badge badge-pill badge-danger"></span>
                                </a>
                            </li>
                        @endif

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucfirst(Auth::user()->name) }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if (session()->has('success'))
            <div class="container mt-4">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                        <i class="ri-check-double-line"></i>
                        {{ session()->get('success') }}
                    </div>
                </div>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="text-center" style="background-color: #FED8B1;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up for our newsletter</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form5Example27" class="form-control"
                                    placeholder="Email Address" />
                                <label class="form-label" for="form5Example27"></label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary mb-4">
                                Subscribe
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <p class="text-dark">© 2022 Copyright by The Pizzeria</p>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>
