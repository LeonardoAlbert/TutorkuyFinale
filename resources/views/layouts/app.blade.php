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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0 row">
            <div class="col-9 mx-auto">
                <div class="d-flex justify-content-between w-100 px-2">
                    <a class="navbar-brand my-auto" href="{{ url('/categories/index') }}">
                        <img src="/storage/assets/img/logo/NavbarLogo.png" width="90" height="90" alt="" class="w-100 rounded post">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button> 
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav w-100 d-flex justify-content-center p-0">
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/categories/index" class="nav-link p-0">Cari Tutor</a>
                            </li>
                            @if(auth()->user())
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/" class="nav-link p-0">Jadwal Saya</a>
                            </li>
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/" class="nav-link p-0">Kelas Terdahulu</a>
                            </li>
                            @endif
                        </ul>

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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="d-inline-block">Halo,</span>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            <a href="/jobs/create" class="dropdown-item">New Category</a>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
            
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- <script src="/js/index.js"></script> -->
<script src="{{ asset('js/index.js') }}" defer></script>

</html>

{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TutorKuy</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm p-0 row">
            <div class="col-9 mx-auto">
                <div class="d-flex justify-content-between w-100 px-2">
                    <a class="navbar-brand my-auto" href="{{ url('/') }}">
                        <img src="{{ url('/assets', 'darkGray.png') }}" alt="" width="100px">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav w-100 d-flex justify-content-center p-0">
                            @if(auth()->user())
                            <li class="nav-item py-4 px-2">
                                <a href="/" class="nav-link p-0">Untuk Anda</a>
                            </li>
                            @endif
                            <li class="nav-item mx-4 py-4 px-2">
                                <a href="/posts/search" class="nav-link p-0">Jelajahi</a>
                            </li>
                            <li class="nav-item py-4 px-2">
                                <a href="/jobs" class="nav-link p-0">Pekerjaan</a>
                            </li>
                        </ul>

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
                                            <img src="{{ url(auth()->user()->image) }}" alt="profile" class="rounded-circle">                                    
                                        </span>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="/users/{{Auth::user()->id}}" class="dropdown-item">Profile</a>
                                        <a href="/users/{{Auth::user()->id}}/edit" class="dropdown-item">Edit Profile</a>

                                        @if(auth()->user()->role == 0)
                                            <a href="/posts/create" class="dropdown-item">New Post</a>
                                        @else
                                            <a href="/jobs/create" class="dropdown-item">New Job</a>
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
                        <span>&copy; Prolific</span>
                        <span class="ml-4">Terms and Conditions</span>                        
                    </div>
                    <div>
                        <i class="fab fa-instagram mr-2"></i>
                        <i class="fab fa-youtube mr-2"></i>
                        <i class="fab fa-facebook-f"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/index.js"></script>
</body>
</html> --}}


