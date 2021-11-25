@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 text-center">
                <div class="card-body">
                    
                    <div class="welcome mt-4">Buat Akun Anda</div>
                    <div class="mx-auto welcome-border mb-4"></div>
                    <div class="text-center mb-4">
                        <i class="fab fa-google icon"></i>
                        <i class="fab fa-facebook-f icon"></i>
                        <i class="fab fa-twitter icon"></i>
                        <i class="fab fa-linkedin-in icon"></i>
                    </div>
                    <small class="d-block mb-3">atau gunakan alamat email anda</small>
                    <form method="POST" action="{{ route('register') }}" class="mb-3">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror formInput" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nama lengkap">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror formInput" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror formInput" name="password" autocomplete="new-password" placeholder="Kata sandi">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control formInput" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi Kata Sandi">
                            </div>
                        </div>

                        <div class="form-group w-100 text-center my-3">
                            Saya sebagai
                            <label for="client" class="btn btn-outline-primary mx-2" id="client-btn">Tutor</label>
                            <input type="radio" class="d-none @error('role') is-invalid @enderror" name="role" id="client" value="client">

                            <label for="student" class="btn btn-outline-primary" id="student-btn">Student</label>
                            <input type="radio" class="d-none @error('role') is-invalid @enderror" name="role" id="student" value="student">
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-left">
                            <input type="checkbox" name="agree" id="agree" class="@error('agree') is-invalid @enderror">
                            <label class="align-middle" for="agree"><small>Saya setuju dengan <span class="text-primary">syarat</span> dan kebijakan <span class="text-primary">privasi</span></small></label>
                            @error('agree')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary w-100">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </form>
                    <small class="d-block">Sudah Memiliki? <a href="#" class="text-primary">Masuk</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection