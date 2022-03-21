@extends('layouts.app')

@section('content')

<div class="col-md-5 card mx-auto mt-5">
    <div class="display-4 text-center mt-3 text-primary">
        <h4 class="font-weight-bold text-primary">Rincian Pesanan</h4>
    </div>
    <div class="row">
        <div class="card shadow-dark p-4">

            <div><span class="text-dark"> Status Kelas</span><br><span>
                {{-- Menunggu Peserta, Memulai, Selesai, Batal --}}
            @if ($orders->post->status=="Memulai")
                <i class="fa fa-circle active" style="color:rgb(224, 101, 0)"></i>
            @elseif($orders->post->status=="Menunggu Pembayaran")
                <i class="fa fa-circle active" style="color:rgb(151, 142, 14)"></i>
            @else
                <i class="fa fa-circle active" style="color:rgb(14, 151, 21)"></i>
            @endif
            <span></small> {{$orders->post->status}}</span></div>
            <div><span class="text-dark">Nomor Order </span><br><span> OD{{$orders->id}}</span></div>
            <div><span class="text-dark">Status Order </span><br><span> {{$orders->status}}</span></div>
        </div>
    </div>
    <div class="row">
        <div class="card shadow-dark p-4">
            <div>
                <h6 class="text-primary">Informasi Kelas</h6>
            </div>
            {{-- <div class="column"></div> --}}
            <div class="card shadow-dark p-4">
                <a href="/posts/{{$orders->post_id}}/details" class="text-black">
                    <div class="d-flex justify-content-between">
                        <div class="col my-auto">
                            <img src="/storage/{{ $orders->post->image }}"alt="" class="mt-2 rounded smallPost d-block mx-auto mb-3">
                        </div>
                        <div class="col my-auto">
                            <a href="/posts/{{$orders->post_id}}/details" class="text-black text-bold">{{ $orders->post->title }}</a><br>
                            <span class="text-danger"> Rp.{{$orders->total}},00</span>
                            <div class="text-dark my-1"></div>
                        </div>
                        <div class="col my-auto">
                            <div class="btn btn-primary rounded-pill form-group mt-3 float-right" onclick="location.href='/posts/{{$orders->post_id}}/details'">
                                <h6 class="text " style="margin: 0px">Detail <i class="fa fa-arrow-circle-right" style="color:#d8d8d8"></i></h6>
                            {{-- </button> --}}
                        </div>
                    </div>
                </a>
            </div>
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
        </div>
        <div class="row"><span class="text-dark">Deskripsi Kelas </span> </div>
        <div class="row mb-3"> <span>{{$orders->post->description}}</span></div>
        @if($orders->post->link_meeting)
            <div class="row "><span class="text-dark">Link Meeting Kelas </span> </div>
            <div class="row mb-3"> <span>{{$orders->post->link_meeting}}</span></div>
        @else
        @endif
        <div class="row"><span class="text-dark">Material Kelas</span> </div>
        <div class="row mb-3"> <span> <a href="{{ route('material.download', $orders->post->id) }}"><i class="fas fa-download" font-size="20em"></i></a></span></div>
    </div>
</div>

    <div class="row">
        <div class="card shadow-dark p-4">
            <div>
                <h6 class="text-primary">Jadwal Kelas</h6>
            </div>
            @foreach($sched as $sche)
            <span> {{$sche->DayofWeek}}, {{$sche->day}} {{$sche->month}} {{$sche->year}} Pada Pukul: {{$sche->hour}}:{{$sche->minute}} - {{$sche->end_hour}}:{{$sche->minute}}</span><br>
            @endforeach
        </div>
        @if(($orders->post->status == 'Selesai' || $orders->post->status == 'Closed') && $can_review)
        <div class="col-12 d-flex justify-content-center mb-4">
            <button type="button" class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#exampleModalCenter">
                Review Kelas
            </button>
        </div>
        @endif
    </div>


</div>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Selesaikan Kelas
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda ingin menyelesaikan kelas dan meneruskan pembayaran ke tutor?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apabila anda telah menyelesaikan kelas, pembayaran anda akan diteruskan ke tutor.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Batal</button>
            <form action="/orders/ended" class="form-inline" method="POST">
                @csrf
                <input type="hidden" id="orderId" name="orderId" value="{{$orders->id}}">
                <input type="submit" value="Selesai" class="btn btn-primary finish-class rounded-pill" data-toggle="tooltip"/>
            </form>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
