@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-9 mx-auto mt-5">
        {{-- <div class="card card-2">
            <div class="card-header bg-white">
                <div class="invoice-title">
                    <div class="row">
                    </div>
                    <br>
                    
                </div>
            </div>
        </div> --}}
            {{-- <div class="row row-striped card shadow-dark mt-2"> --}} 
            <div class="card shadow-dark p-4">
                <div class="row">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="text-primary">Detail Kelas: <br>
                                
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                        {{-- <img src="/storage/{{ $post->user->image }}" alt="User Image" class="rounded-circle w-200 "> --}}
            
                        {{-- <h5 class="mt-0 font700 text-center mt-2 ml-3"><a href="{{ url("users", $post->user->id) }}"> {{ $post->user->name }} 
                            @if($user->verif == 2)
                                <i class="fa fa-check mr-1"></i>
                                @endif </a></h5> --}}
            
                        {{-- <h5 class="mt-0 text-center mt-2 ml-3"> <i class="fas fa-star"></i>{{$user->rate}} ( {{$user->num_work}} Reviews ) </h5> --}}
                    </div>
                    
                    <div class="card shadow-dark p-4">
                        <div class="row">
                            <div class="col my-auto">
                                <img src="/storage/{{ $post->image }}" alt="" class="mt-2 rounded post d-block mb-3" width="800px" height="500px">
                            </div>
                            <div class="col my-auto">
                                <h4 style="color: rgb(36, 36, 36)">{{ $post->title }}</h4>
                            </div>
                            <div class="col my-auto">
                                @guest
                                    @if ($post->count_participant == $post->participants)
                                <label class="badge badge-light  text-danger"> <h4>Kelas Telah Penuh {{ $post->count_participant }} / {{$post->participants}}.</h4></label>
                                    @else
                                <h4 style="text-align:end" class="float-right">Terisi <label class="badge badge-dark text-light"> {{ $post->count_participant }} / {{$post->participants}} </label>! <br>Daftar Segera!</h4>
                            @endif
                                @endguest
                                @if(Auth::check() && auth()->user()->role == 0 && $post->count_participant != $post->participants)
                                    @if ($post->count_participant == $post->participants)
                                        <label class="badge badge-light  text-danger"> <h4>Kelas Telah Penuh {{ $post->count_participant }} / {{$post->participants}}.</h4></label>
                                    @else
                                        <h4 style="text-align:end" class="float-right">Terisi <label class="badge badge-dark text-light"> {{ $post->count_participant }} / {{$post->participants}} </label>! <br>Daftar Segera!</h4>
                                    @endif
                                @elseif(Auth::check() && auth()->user()->role == 1)
                                    <h4 class="float-right">Terisi <label class="badge badge-dark text-light"> {{ $post->count_participant }} / {{$post->participants}} </label> ! </h4>
                                @endif
                            </div>
                            
                        </div>
                        <div class="row">
                            <h3 class="text-primary">Tentang Kelas</h3>
                        </div>
                        <div class="row mt-2">
                            <p class="lead">{{ $post->description }} </p>
                        </div>
                    </div>
                </div>
                
            </div>
                
                <div class="card shadow-dark p-4">
                    <div class="row">
                        <h3 class="text-primary">Harga dan Jadwal Kelas</h3>
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
                    @if(Auth::check() && auth()->user()->role == 1 && $post->status == 'Menunggu Peserta')
                        <hr>
                        <div class="col-12">
                            <div class="btn btn-primary rounded-pill float-right" onclick="location.href='/posts/{{$post->id}}/edit';">
                                Edit Kelas
                                {{-- <a href="/posts/{{$post->id}}/edit" class="daftar-kelas mb-3"> <button type="button" class="btn btn-primary rounded-pill">Edit Kelas</button></a> --}}
                            </div>
                        </div>
                    @elseif(Auth::check() && auth()->user()->role == 1 && $post->status != 'Menunggu Peserta')
                    <hr>
                        <div class="col-12">
                            <div class="btn btn-light rounded-pill float-right" onclick="">
                                Edit Kelas
                                {{-- <a href="/posts/{{$post->id}}/edit" class="daftar-kelas mb-3"> <button type="button" class="btn btn-primary rounded-pill">Edit Kelas</button></a> --}}
                            </div>
                            <h5 class="text-dark">Anda tidak bisa edit kelas karena kelas telah berjalan</h5>
                        </div>
                    @endif
                    </div>
                
                </div>
                @guest
                <div class="card shadow-dark p-4">
                    <div class="row">
                        <h3 class="text-primary">Tentang Tutor</h3>
                    </div>
                <div class="row mt-2">
                    <div class="col-2">
                        <img src="/storage/{{$user->image }}" alt="" class=" rounded-circle-lg w-200" style="width:250px " style="height:100px">
                    </div>
                    <div class="col-10">
                        <h3 class="mt-0 font700  ml-3">
                            {{-- <a href="{{ url("users", $post->user->id) }}">  --}}
                            {{ $post->user->name }} 
                            @if($user->verif == 1)
                                <i class="fa fa-check mr-1"></i>
                            @endif    
                            <a href="{{ url("users", $post->user->id) }}" class="daftar-kelas mb-3"> 
                                
                                <i class="fa fa-user-circle"></i> 
                            </a>
                            {{-- </a> --}}
                            
                            @if($user->verif == 2)
                                <i class="fa fa-check mr-1"></i>
                            @endif <br> </a>
                            <label class="badge badge-light rounded-pill full-width" ><i class="fas fa-star" style="color:#FFD700"></i> {{round($user->rate,1)}} x {{$user->num_work}} Ulasan </label>
                            <form action="/chat/newRoom" class="form-inline" method="POST">
                                @csrf
                                <input type="hidden" id="tutorId" name="tutorId" value="{{$post->user->id}}">
                                <input type="submit" style="width:250px " value="Kontak Saya" class="btn btn-primary rounded-pill " />
                            </form>
                            
                        </h3>
                    </div>
                </div>
                <div class="btn btn-primary rounded-pill mt-3" onclick="location.href='/orders/{{$post->id}}/create';">
                    Daftar Kelas
                </div>
                @endguest
                @if(Auth::check() && auth()->user()->role == 0)
                <div class="card shadow-dark p-4">
                    <div class="row">
                        <h3 class="text-primary">Tentang Tutor</h3>
                    </div>
                <div class="row mt-2">
                    <div class="col-2">
                        <img src="/storage/{{$user->image }}" alt="" class=" rounded-circle-lg w-200" style="width:250px " style="height:100px">
                    </div>
                    <div class="col-10">
                        <h3 class="mt-0 font700  ml-3">
                            {{-- <a href="{{ url("users", $post->user->id) }}">  --}}
                            {{ $post->user->name }} 
                            @if($user->verif == 1)
                                <i class="fa fa-check mr-1"></i>
                            @endif    
                            <a href="{{ url("users", $post->user->id) }}" class="daftar-kelas mb-3"> 
                                
                                <i class="fa fa-user-circle"></i> 
                            </a>
                            {{-- </a> --}}
                            
                            @if($user->verif == 2)
                                <i class="fa fa-check mr-1"></i>
                            @endif <br> </a>
                            <label class="badge badge-light rounded-pill full-width" ><i class="fas fa-star" style="color:#FFD700"></i> {{round($user->rate,1)}} x {{$user->num_work}} Ulasan </label>
                            <form action="/chat/newRoom" class="form-inline" method="POST">
                                @csrf
                                <input type="hidden" id="tutorId" name="tutorId" value="{{$post->user->id}}">
                                <input type="submit" value="Kontak Saya" class="btn btn-primary rounded-pill " />
                            </form>
                            
                        </h3>
                    </div>
                </div>
            {{-- </div> --}}
                 @endif
            <br>
            
            @if(Auth::check() && auth()->user()->role == 0 && $post->count_participant != $post->participants && $allow_user )
                <div class="btn btn-primary rounded-pill" onclick="location.href='/orders/{{$post->id}}/create';">
                    Daftar Kelas
                </div>
            @elseif(Auth::check() && auth()->user()->role == 1)
                {{-- <div class="btn btn-primary rounded-pill" onclick="location.href='/orders/{{$post->id}}/create';">
                Daftar Kelas
                </div> --}}
            @endif
           
            </div>
        </div>
    </div>
</div>
<br>
@endsection
