<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <script src="{{ asset('js/index.js') }}" defer></script>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0 row">
            <div class="col-9 mx-auto">
                <div class="d-flex justify-content-between w-100 px-2">

                    <a class="navbar-brand my-auto" href="{{ url('/home') }}">
                        <img src="/storage/assets/img/logo/NavbarLogo.png" width="70" alt="" >
                        <span>TutorKuy</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @guest
                        <ul class="navbar-nav w-100  justify-content-center p-0">

                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/categories/index" class="nav-link p-0">Cari Tutor</a>
                            </li>

                        @else
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav w-100 d-flex justify-content-center p-0">
                            @if(auth()->user()->role == 0 )

                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/categories/index" class="nav-link p-0">Cari Tutor</a>
                            </li>

                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/chat" class="nav-link p-0">Pesan</a>
                            </li>
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/users/upcomingclass" class="nav-link p-0">Kelas Yang Akan Datang</a>
                            </li>
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/users/pastclass" class="nav-link p-0">Kelas Yang Telah Selesai</a>
                            </li>
                            @elseif(auth()->user()->role == 1)
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/chat" class="nav-link p-0">Pesan</a>
                            </li>
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/users/tutorclass" class="nav-link p-0">Order</a>
                            </li>
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/users/tutorupcomingclass" class="nav-link p-0">Jadwal Kelas Anda</a>
                            </li>
                            @endif
                        </ul>
                        @if(auth()->user()->role == 2)
                        <ul class="navbar-nav w-100 d-flex justify-content-center p-0">
                        <li class="nav-item mx-4 py-4 px-2">
                                <a href="/categories/create" class="nav-link p-0">Buat Kategori</a>
                            </li>

                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/admin/managepayment" class="nav-link p-0">Pembayaran</a>
                            </li>
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/admin/manageverif" class="nav-link p-0">Verifikasi Tutor</a>
                            </li>
                            </ul>
                        @endif
                        @endguest
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                            <li class="nav-item dropdown">
                                    <div id="navbarDropdown" class="w-100 nav-link dropdown-toggle align-center align-middle p-0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="d-inline-block">Halo!</span>
                                        <a id="navbarDropdown" class=" text-primary d-inline-block mx-1" href="#">
                                            {{ Auth::user()->name }}

                                        </a>
                                        <span class="nav-profile d-inline-block">
                                            <img src="/storage/{{Auth::user()->image}}" alt="profile" class="rounded-circle">
                                        </span>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="/users/{{Auth::user()->id}}" class="dropdown-item">Profile</a>
                                        <a href="/users/{{Auth::user()->id}}/edit" class="dropdown-item">Edit Profile</a>

                                        @if(auth()->user()->role == 0 || auth()->user()->role == 1 )
                                            <a href="/users/requestcategory" class="dropdown-item">Request Kategori</a>
                                            <a href="/orders/history" class="dropdown-item">Order History</a>
                                        @endif

                                        @if( auth()->user()->role == 1)
                                            <a href="/posts/create" class="dropdown-item">Buat Kelas </a>
                                        @endif

                                        @if(auth()->user()->role == 2)
                                            <a href="/admin" class="dropdown-item">Admin Dashboard</a>
                                            <a href="/categories/create" class="dropdown-item">Buat Kategori</a>
                                        @endif

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <!-- <li class="nav-item dropdown">

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="d-inline-block">Halo,</span>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li> -->
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            <div class="container">
                @if(session()->has('success'))
                <div class="alert alert-success mt-2">
                    {{ session()->get('success') }}
                </div>
                @endif

                @if(session()->has('error'))
                <div class="alert alert-danger mt-2">
                    {{ session()->get('error') }}
                </div>
                @endif
            </div>
            @yield('content')
        </main>

        <div class="w-100 footer mt-5">
            <div class="container py-4 sub">
                <div class="row footer-content">
                    <div class="col-7 pb-4">
                        <div class="row">
                            <div class="col-3">
                                <strong class="d-block mb-2 footer-title">Service</strong>
                                <div class="mb-1">Help</div>
                                <div class="mb-1">Customer Service</div>
                            </div>
                            <div class="col-3">
                                <strong class="d-block mb-2 footer-title">Source</strong>
                                <div class="mb-1">Pricing</div>
                            </div>
                            <div class="col-3">
                                <strong class="d-block mb-2 footer-title">Company</strong>
                                <div class="mb-1">About Us</div>
                                <div class="mb-1">Contact Us</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3 d-flex justify-content-between">
                    <div>
                        <span>&copy; TutorKuy 2021</span>
                        <span class="ml-4">Terms and Conditions</span>
                    </div>
                    <div>
                        <i class="fab fa-instagram mr-2"></i>

                        <i class="fab fa-facebook-f"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- <script src="/js/index.js"></script> -->
<script src="{{ asset('js/index.js') }}" defer></script>
<script src="{{ asset('js/app.js') }}"></script>
</html>


