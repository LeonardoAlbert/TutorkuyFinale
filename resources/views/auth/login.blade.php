@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0">
                <div class="card-body text-center">
                    <div class="welcome">Selamat Datang!</div>
                    <div class="mx-auto welcome-border mb-4"></div>
                    <div class="text-center mb-4">
                        <i class="fab fa-google icon"></i>
                        <i class="fab fa-facebook-f icon"></i>
                        <i class="fab fa-twitter icon"></i>
                        <i class="fab fa-linkedin-in icon"></i>
                    </div>
                    <thead class="d-block mb-3">atau gunakan alamat email anda</thead>

                    <form class="mb-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror formInput" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror formInput" name="password" required autocomplete="current-password" placeholder="Kata Sandi">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <div class="form-check form-check-lg">
                                    <input class="form-check-input me-2" type="checkbox" value="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Ingat Saya
                                    </label>
                                    {{-- <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5"></button> --}}
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="text" href="{{ route('password.request') }}">
                                        Lupa kata sandi?
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    Masuk
                                </button>
                            </div>
                        </div>
                    </form>
                    <small class="d-block">Belum punya? <a href="/register" class="text">Daftar</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
