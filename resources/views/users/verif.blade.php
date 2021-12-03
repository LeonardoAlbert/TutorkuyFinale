@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0">
                <div class="card-body verify-content">
                    <img src="{{ url('/assets', 'darkGray.png') }}" class="logo-form mx-auto d-block" alt="darkGray">
                    <div class="welcome mt-4">Verifikasi Pelajar</div>
                    <div class="mx-auto welcome-border mb-4"></div>
                    
                    <strong>Tidak ada file yang dipilih</strong>
                    <p>Harap unggah dokumentasi pelajar Anda.</p>

                    <a href="#" class="btn btn-primary w-100 mt-5">Unggah</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection