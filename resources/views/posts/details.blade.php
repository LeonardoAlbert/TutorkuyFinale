@extends('layouts.app')

@section('content')
<br>
<div class="col-md-9 mx-auto mt-5">
    <div class="card-1">
        <div class="row row-striped card shadow-dark mt-2">
            <h4 class="text-primary mt-3 ml-4">Detail Kelas: <b style="color: rgb(26, 26, 26)">{{ $post->title }}</b></h4>
            <div class="card shadow-dark p-4">
                <div class="row">
                </div>
                <div class="row">
                    @if ($post->count_participant == $post->participants)
                        <label class="badge badge-light  text-danger"> <h4>Kelas Telah Penuh {{ $post->count_participant }} / {{$post->participants}}.</h4></label>
                    @else
                        <label class="badge badge-dark text-light"> <h4>Terisi {{ $post->count_participant }} / {{$post->participants}}! Daftar Segera!</h4></label>
                    @endif
                </div>
                <div class="row">
                    <img src="/storage/{{ $post->user->image }}" alt="User Image" class="rounded-circle w-200 ">
        
                    <h5 class="mt-0 font700 text-center mt-2 ml-3"><a href="{{ url("users", $post->user->id) }}"> {{ $post->user->name }} @if($user->verif == 2)
                            <i class="fa fa-check mr-1"></i>
                            @endif </a></h5>
        
                    <h5 class="mt-0 text-center mt-2 ml-3"> <i class="fas fa-star"></i>{{$user->rate}} ( {{$user->num_work}} Reviews ) </h5>
                </div>
                <div class="row">
                    <img src="/storage/{{ $post->image }}" alt="" class="img width: 100% mt-2  img-thumbnail" width="800px" height="500px">
                </div>
            </div>
            
            <div class="card shadow-dark p-4">
                <div class="row">
                    <h3 class="text-bold">Tentang Kelas</h3>
                </div>
                <div class="row mt-2">
                    <p class="lead">{{ $post->description }} </p>
                </div>
            </div>
            <div class="card shadow-dark p-4">
                <div class="row">
                    <h3 class="text-bold">Harga dan Jadwal Kelas</h3>
                </div>
                <div class="row mt-2">
                    <h4 class="text-center mt-1">Jumlah Sesi Tersedia: {{$post->occurrence}} </h4>
                </div>
                <div class="row mt-2">
                    <h4 class="text-center mt-1">Harga per Sesi :
                        <span class="badge badge-dark text-center mt-2">Rp. {{ $post->price }}</span>
                    </h4>
                </div>
                <div class="row">
                    <h4 class="text-center mt-1">Jadwal Kelas</h4>
                </div>
                <div class="row">
                    @foreach($sched as $sche)
                    <div class="col-12">
                        <h4 class="badge badge-light sub-heading cs">{{$sche->DayofWeek}}, {{$sche->day}} {{$sche->month}} {{$sche->year}} at {{$sche->hour}}:{{$sche->minute}} - {{$sche->end_hour}}:{{$sche->minute}} </h4>
                    </div>
                    @endforeach
                </div>
            </div>
            @if(Auth::check() && auth()->user()->role == 0)
            <div class="card shadow-dark p-4">
                <div class="row">
                    <h3 class="text-bold">Tentang Tutor</h3>
                </div>
            <div class="row mt-2">
                <div class="col-2">
                    <img src="/storage/{{$user->image }}" alt="" class=" rounded-circle-lg w-200" style="width:250px " style="height:100px">
                </div>
                <div class="col-10">
                    <h3 class="mt-0 font700  mt-2 ml-3"><a href="{{ url("users", $post->user->id) }}"> 
                        {{ $post->user->name }} 
                        @if($user->verif == 2)
                            <i class="fa fa-check mr-1"></i>
                        @endif <br> </a>
                        <label class="badge badge-light rounded-pill full-width" ><i class="fas fa-star" style="color:#FFD700"></i> {{$user->rate}} x {{$user->num_work}} Ulasan </label>
                        <form action="/chat/newRoom" class="form-inline" method="POST">
                            @csrf
                            <input type="hidden" id="tutorId" name="tutorId" value="{{$post->user->id}}">
                            <input type="submit" style="width:250px " value="Kontak Saya" class="btn btn-primary rounded-pill " />
                        </form>
                    </h3>
                </div>
            </div>
        </div>
        @endif
        @if(Auth::check() && auth()->user()->role == 0 && $post->count_participant != $post->participants)
            <div class="btn btn-primary rounded-pill" onclick="location.href='/orders/{{$post->id}}/create';">
                Daftar Kelas
            </div>
        @endif
        @if(Auth::check() && auth()->user()->role == 1 && $post->status == 'Menunggu Peserta')
            <div class="row mt-3 ml-3">
                <a href="/posts/{{$post->id}}/edit" class="daftar-kelas mb-3"> <button type="button" class="btn btn-primary ">Edit Kelas</button></a>
            </div>
        @endif
        </div>
    </div>
</div>
<br>
@endsection
