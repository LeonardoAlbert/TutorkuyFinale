@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0">
                <div class="card-body verify-content">
                    <img src="{{ url('/assets', 'darkGray.png') }}" class="logo-form mx-auto d-block" alt="darkGray">
                    <div class="welcome mt-4">Verifikasi sebagai Tutor Verified TutorKuy</div>
                    <div class="mx-auto welcome-border mb-4"></div>
                    <strong class="d-block mb-3">Harap unggah dokumentasi petunjuk kualifikasi Anda.</strong>
                    <p>
                        Anda dapat mengunggah 1 dokumen yang membuktikan bahwa anda memiliki kualifikasi sebagai Tutor dokumen Anda bisa menunjukan bahwa anda terdaftar di sekolah atau universitas. Dokumen Anda harus menampilkan:
                    </p>
                    <ul>
                        <li>Nama lengkap Anda</li>
                        <li>Tanggal dokumen dikeluarkan dalam 3 bulan terakhir</li>
                       
                    </ul>
                    <p>
                        Contoh dokumen yang diterima adalah Kualifikasi Pengajar, Tanda Petunjuk bahwa dapat mengajar , dan lain lain.
                    </p>

                    <a href="/users/verif" class="btn btn-primary w-100 mt-5">Lanjut</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection