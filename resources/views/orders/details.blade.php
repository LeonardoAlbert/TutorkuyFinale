@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card shadow-dark p-4">
                <div class="row">
                    <div class="col-1 p-0">
                        <img src="/storage/{{ $orders->image }}" alt="" class="rounded-circle-lg"> 
                    </div>
                    <div class="col-11">
                        <a href="/posts/{{$orders->post_id}}/details" class="text-black">{{ $orders->title }}</a>
                        <div class="text-dark my-1">
                            
                            
                            
                        </div>
                    </div>
                </div>
                
                <div class="mt-3">
                    <span class="text-bold">Class Description </span><span>{{$orders->description}}</span>
                </div>
            <div><span class="text-bold">Class Price: </span><span> {{$orders->price}}</span></div>
            <div><span class="text-bold">Class Status: </span><span> {{$orders->status}}</span></div>
            <div><span class="text-bold">Class Schedules: </span><span> {{$orders->schedule}}</span></div>
            @if($orders->linkmeeting)
            <div><span class="text-bold">Class link meeting: </span><span> {{$orders->linkmeeting}}</span></div>
            @endif
            <div class="row">
               
                
                @if($orders->status == "Menunggu Kelas Dilaksanakan" && auth()->user()->id == $orders->user_id)
                <div class="col-2">
                    <a href="/orders/{{$orders->id}}/createlinkmeeting" class="btn btn-primary">Buat Link Video Conference</a>
                </div>
                @endif
               
                @if($orders->status == "Menunggu Kelas Dilaksanakan" && auth()->user()->id == $orders->orderuser_id)
                <div class="col-2">
                    <form action ="/orders/ended"  class="form-inline" method="POST" >
                    @csrf
                    <input type="hidden" id="orderId" name="orderId" value="{{$orders->id}}">
                    <input type="submit" value="Selesai" class="btn btn-primary" />
                    </form> 
                </div>
                @endif


            </div>
        </div>
    </div>
</div>
@endsection