@extends('layouts.app')

@section('content')


<div class="col-md-7 card mx-auto mt-5">
    <h3 class="display-4 text-center mb-2 text-primary mt-5">Order Anda</h1>
        <h4>Upcoming class:</h4>
        @foreach($class as $data)
        @if($data->status == 'Memulai')
        <div class="row row-striped card shadow-dark mt-2">
            <div class="col-12">
                <h4 class="text-uppercase"><strong><a href="/orders/{{$data->id}}/tutor/details">Kelas {{$data->title}}</a></strong></h4>
                <h4>Jumlah Peserta : ( {{$data->count_participant}} / {{$data->participants}}) </h4>
            </div>
        </div>
        @endif
        @endforeach

        <h4>Menunggu Peserta:</h4>
        @foreach($class as $data)
        @if($data->status == 'Menunggu Peserta')
        <div class="row row-striped card shadow-dark mt-2">
            <div class="col-12">
                <h4 class="text-uppercase"><strong><a href="/orders/{{$data->id}}/tutor/details">Kelas {{$data->title}}</a></strong></h4>
                <h4>Jumlah Peserta : ( {{$data->count_participant}} / {{$data->participants}})</h4>
            </div>
        </div>
        @endif
        @endforeach

        <h4>Kelas Selesai:</h4>
        @foreach($class as $data)
        @if($data->status == 'Selesai' || $data->status =='Transfered')
        <div class="row row-striped card shadow-dark mt-2">
            <div class="col-12">
                <h4 class="text-uppercase"><strong><a href="/orders/{{$data->id}}/tutor/details">Kelas {{$data->title}}</a></strong></h4>
                <h4>Jumlah Peserta : ( {{$data->count_participant}} / {{$data->participants}})</h4>
            </div>
        </div>
        @endif
        @endforeach

        <h4>Kelas Dibatalkan:</h4>
        @foreach($class as $data)
        @if($data->status == 'Batal')
        <div class="row row-striped card shadow-dark mt-2">
            <div class="col-12">
                <h4 class="text-uppercase"><strong><a href="/orders/{{$data->id}}/tutor/details">Kelas {{$data->title}}</a></strong></h4>
                <h4>Jumlah Peserta : ( {{$data->count_participant}} / {{$data->participants}})</h4>
            </div>
        </div>
        @endif
        @endforeach

        <br><br>
        @empty($class)
        <h4><span class="text-dark">Belum ada kelas yang terbuat</span></h4>
        @endempty
        @endsection
