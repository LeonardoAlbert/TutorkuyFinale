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
                            
                            <span class="mt-2">
                                <i class="fas fa-map-marker-alt mr-0"></i>
                                sdsd
                            </span>
                            
                        </div>
                    </div>
                </div>
                
                <div class="mt-3">
                    <span class="text-bold">Class Description </span><span>{{$orders->description}}</span>
                </div>
            <div><span class="text-bold">Class Price: </span><span> {{$orders->price}}</span></div>
            <div><span class="text-bold">Class Status: </span><span> {{$orders->status}}</span></div>
            <div class="row">
                <div class="col-10">asdasdasd</div>
                
                @if($orders->status == "Menunggu Kelas Dilaksanakan")
                
                <div class="col-2">
                    <form action ="/orders/ended"  class="form-inline" method="POST" >
                    @csrf
                    <input type="hidden" id="orderId" name="orderId" value="{{$orders->id}}">
                    <input type="submit" value="Selesai" class="btn btn-success" />
                    </form> 
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection