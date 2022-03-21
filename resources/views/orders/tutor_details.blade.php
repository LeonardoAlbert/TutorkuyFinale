@extends('layouts.app')

@section('content')

<div class="col-md-5 card mx-auto mt-5">
    <div class="display-4 text-center mt-3 text-primary">
        <h4 class="font-weight-bold text-primary">Rincian Pesanan</h4>
    </div>
    <div class="row">
        <div class="card shadow-dark p-4">
            {{-- <div><span class="text-dark text-bold">Status Kelas</span><br><span class="text-bold"> {{$post->status}}</span></div>
            <br>
            <div><span class="text-dark text-bold">Total Participant: </span><br><span class="text-bold"> {{$post->count_participant}} / {{$post->participants}}</span></div> --}}
            <div><span class="text-dark"> Status Kelas</span><br><span> 
                {{-- Menunggu Peserta, Memulai, Selesai, Batal --}}
                {{-- Status: Menunggu Peserta, Memulai, Selesai, Batal, Closed --}}
            @if ($post->status=="Menunggu Kelas Dilaksanakan")
                <i class="fa fa-circle active" style="color:rgb(224, 101, 0)"></i>
            @else
                <i class="fa fa-circle active" style="color:rgb(96, 151, 14)"></i>
            @endif
            <span></small> {{$post->status}}</span></div>
            <div><span class="text-dark">Nomor Order </span><br><span> OD{{$post->id}}</span></div>
        </div>

    </div>

    <div class="row">
        <div class="card shadow-dark p-4">
            <div>
                <h6 class="text-primary">Informasi Kelas</h6>
            </div>
            <div class="row"></div>
            {{-- <div class="card shadow-dark p-4">
                <a href="/posts/{{$post->id}}/details" class="text-black">
                    <div class="row">
                        <div class="col-1 p-0">
                            <img src="/storage/{{ $post->image }}" width="50px" height="50px" alt="">
                        </div>
                        <div class="col-11">
                            <a href="/posts/{{$post->id}}/details" class="text-black text-bold text-center">{{ $post->title }}</a><br>
                            <div class="text-dark my-1"></div>
                        </div>
                </a>
            </div> --}}
            <div class="card shadow-dark p-4">
                <a href="/posts/{{$post->id}}/details" class="text-black">
                    <div class="d-flex justify-content-between">
                        <div class="col my-auto">
                            <img src="/storage/{{ $post->image }}"alt="" class="mt-2 rounded smallPost d-block mx-auto mb-3">
                        </div>
                        <div class="col my-auto">
                            <a href="/posts/{{$post->id}}/details" class="text-black text-bold">{{ $post->title }}</a><br>
                            <span class="text-danger"> Rp.{{$post->price * $post->count_participant}},00</span>
                            <div class="text-dark my-1"></div>
                        </div>
                        <div class="col my-auto">
                            <div class="btn btn-primary rounded-pill form-group mt-3 float-right" onclick="location.href='/posts/{{$post->id}}/details'">
                                <h6 class="text " style="margin: 0px">Detail <i class="fa fa-arrow-circle-right" style="color:#d8d8d8"></i></h6>
                            {{-- </button> --}}
                        </div>
                    </div>     
                </a>
            </div>
            
        </div>
        <div class="row"><span class="text-dark">Deskripsi Kelas </span> </div>
        <div class="row mb-3"> <span>{{$post->description}}</span></div>
        @if($post->link_meeting)
        <div class="row "><span class="text-dark">Link Meeting Kelas </span> </div>
        <div class="row mb-3"> <span>{{$post->link_meeting}}</span></div>
        @endif
        <div class="row"><span class="text-dark">Material Kelas</span> </div>
        <div class="row mb-3"> <span> <a href="{{ route('material.download', $post->id) }}"><i class="fas fa-download" font-size="20em"></i></a></span></div>
    </div>
</div>

<div class="row">
    <div class="card shadow-dark p-4">
        <div>
            <h6 class="text-primary">Daftar Peserta</h6>
        </div>
        @foreach($orders as $order)
        <div class="card shadow-dark p-4 d-flex justify-content-between">
            <div class="row">
                <div class="col my-auto"> 
                    <img src="/storage/{{ $order->user->image }}" alt="User Image" class="rounded-circle w-200 "> <span class="ml-2 ">  {{$order->user->name}}  
                </div>
                <div class="col my-auto"> 
                    <a class="btn btn-primary rounded-pill float-right" href="/chat/user/{{$order->user->id}}">chat </a></span>
            </div>
        </div>
        </div>
       {{-- {{$order->user->image}} --}}
        
        @endforeach
    </div>
</div>

<div class="row">
    <div class="card shadow-dark p-4">
        <div>
            <h6 class="text-primary">Jadwal Kelas</h6>
        </div>
        @foreach($sched as $sche)
        <span> {{$sche->DayofWeek}}, {{$sche->day}} {{$sche->month}} {{$sche->year}} at {{$sche->hour}}:{{$sche->minute}} - {{$sche->end_hour}}:{{$sche->minute}}</span>
        @endforeach
    </div>
</div>

<div class="row  mb-3">
    <div class="col my-auto">
        <a href="/posts/{{$post->id}}/createlinkmeeting" class="btn btn-primary rounded-pill" style="width:250px">Buat Link Video Conference</a>
    </div>

    <div class="col my-auto">
        <button type="button" class="btn btn-primary rounded-pill float-right" style="width:250px" data-toggle="modal" data-target="#exampleModalCenter">
            Upload Meeting Material
        </button>
    </div>
</div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Unggah Materi Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/posts/uploadmaterial" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Silakan pilih materi kelas:</label><br><br />
                        <input type="file" name="material" id="material">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="postId" name="postId" value="{{$post->id}}">
                        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Tutup</button>
                        <input type="submit" value="Unggah" class="btn btn-primary w-50 rounded-pill">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
