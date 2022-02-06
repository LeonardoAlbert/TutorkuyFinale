@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="position-sticky">
        <h4 class="font-weight-bold text-primary">Rincian Pesanan</h4>
    </div>
    <div class="row">
        <div class="card shadow-dark p-4">
            <div><span class="text-dark">Status Kelas</span><br><span> {{$orders->status}}</span></div>
            <div><span class="text-dark">Nomor Order </span><br><span> OD{{$orders->id}}</span></div>
        </div>
    </div>

    <div class="row">
        <div class="card shadow-dark p-4">
            <div>
                <h6 class="text-primary">Informasi Kelas</h6>
            </div>
            <div class="row"></div>
            <div class="card shadow-dark p-4">
                <a href="/posts/{{$orders->post_id}}/details" class="text-black">
                    <div class="row">
                        <div class="col-1 p-0">
                            <img src="/storage/{{ $orders->image }}" width="50px" height="50px" alt="">
                        </div>
                        <div class="col-11">
                            <a href="/posts/{{$orders->post_id}}/details" class="text-black">{{ $orders->post->title }}</a><br>
                            <span class="text-info"> Rp.{{$orders->total}},00</span>
                            <div class="text-dark my-1"></div>
                        </div>
                </a>
            </div>
        </div>
        <div class="row"><span class="text-dark">Deskripsi Kelas </span> </div>
        <div class="row mb-3"> <span>{{$orders->post->description}}</span></div>
        @if($orders->linkmeeting)
        <div class="row "><span class="text-dark">Link Meeting Kelas </span> </div>
        <div class="row mb-3"> <span>{{$orders->linkmeeting}}</span></div>
        @endif
        <div class="row"><span class="text-dark">Material Kelas</span> </div>
        <div class="row mb-3"> <span> <a href="{{ route('material.download', $orders->id) }}"><i class="fas fa-download" font-size="20em"></i></a></span></div>
    </div>
</div>

<div class="row">
    <div class="card shadow-dark p-4">
        <div>
            <h6 class="text-primary">Jadwal Kelas</h6>
        </div>
        @foreach($schedules as $schedule)
        <span> {{$schedule->start_date}} - {{$schedule->end_date}}</span>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="col-4">
        <a href="/orders/{{$orders->id}}/createlinkmeeting" class="btn btn-primary" style="width:250px">Buat Link Video Conference</a>
    </div>


    <div class="col-4">
        <form action="/orders/ended" class="form-inline" method="POST">
            @csrf
            <input type="hidden" id="orderId" name="orderId" value="{{$orders->id}}">
            <input type="submit" value="Selesai" class="btn btn-primary" style="width:250px" />
        </form>
    </div>

    <div class="col-4">
        <button type="button" class="btn btn-primary " style="width:250px" data-toggle="modal" data-target="#exampleModalCenter">
            Upload Meeting Material
        </button>
    </div>
</div>
</div>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Unggah Material Meeting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/orders/uploadmaterial" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="image">Bahan Material Meeting</label><br><br />
                        <input type="file" name="material" id="material">
                    </div>


                    <div class="modal-footer">
                        <input type="hidden" id="orderId" name="orderId" value="{{$orders->id}}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Unggah" class="btn btn-primary w-50">
                    </div>
            </div>
        </div>
        </form>
    </div>

</div>
@endsection
