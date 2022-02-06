@extends('layouts.app')

@section('content')


<div class="container">
    <h3 class="display-4 text-center mb-2">Kelas Anda</h1>
        <h4>Upcoming class:</h4>
        @foreach($class as $data)
        @if($data->status == 'Memulai')
        <div class="row row-striped card shadow-dark mt-2">
            <div class="col-12">
                <h4 class="text-uppercase"><strong><a href="/orders/{{$data->id}}/tutor/details">Kelas {{$data->title}}</a></strong></h4>
                <h4>{{$data->count_participant}} / {{$data->participants}}</h4>
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
                <h4>{{$data->count_participant}} / {{$data->participants}}</h4>
            </div>
        </div>
        @endif
        @endforeach

        <h4>Kelas Selesai:</h4>
        @foreach($class as $data)
        @if($data->status == 'Selesai')
        <div class="row row-striped card shadow-dark mt-2">
            <div class="col-12">
                <h4 class="text-uppercase"><strong><a href="/orders/{{$data->id}}/tutor/details">Kelas {{$data->title}}</a></strong></h4>
                <h4>{{$data->count_participant}} / {{$data->participants}}</h4>
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
                <h4>{{$data->count_participant}} / {{$data->participants}}</h4>
            </div>
        </div>
        @endif
        @endforeach

        <br><br>
        @empty($upCommingClass)
        <h4><span class="text-dark">Belum ada jadwal kelas yang terbuat</span></h4>
        @endempty
        @endsection
