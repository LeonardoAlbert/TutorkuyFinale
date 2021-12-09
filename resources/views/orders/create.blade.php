@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 card p-0 mx-auto">
        <div class="col-3 px-2 mb-2">
                <a href="/posts/{{ $post->id }}" class="w-100">
                    <img src="/storage/{{ $post->image }} " alt="" class="w-100 rounded post">
                    <div class="text-muted mb-3"> <a href="{{ url("users", $post->user->id) }}" class="text-muted">{{ $post->user->name }}</a></div>
                </a>
                <div class="mt-2">
                    <div class="d-flex justify-content-between">
                        <span class="sub-heading">{{ $post->title }}</span>
                       
                        <div class="text-left pt-3">{{ $post->description }}</div>
                        
                        
                    </div>
                    <div class="text-left pt-3"> Harga ::{{ $post->price }}</div>
                    <div class="text-left pt-3">{{ $schedule->schedule }}</div>
                  
                    <div class="text-left pt-3"> Account number ::  32132179312 a.n TutorKuy(BCA) </div>
                    </div>
            </div>
            <div class="card-body">
                <div class="text-primary heading mb-3">Bukti Pembayaran</div>
                <form action="/orders" enctype="multipart/form-data" method="POST" id="create-post-form">
                    @csrf

                    <div class="form-group">
                        <label for="ordername">Nama</label>
                        <input type="text" 
                            name="ordername" 
                            class="form-control formInput @error('ordername') is-invalid @enderror formInput"
                            value="{{ old('ordername') }}">

                        @error('ordername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="banknumber">Nomor Account </label>
                        <input type="text" 
                            name="banknumber" 
                            class="form-control formInput @error('banknumbe') is-invalid @enderror formInput"
                            value="{{ old('banknumber') }}">

                        @error('banknumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bankcode">Bank Pengirim </label>
                        <input type="text" 
                            name="bankcode" 
                            class="form-control formInput @error('bankcode') is-invalid @enderror formInput"
                            value="{{ old('bankcode') }}">

                        @error('bankcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="image">Foto Bukti Pembayaran</label>
                        <input type="file" name="image" id="image" class="d-block @error('image') is-invalid @enderror">
                        
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <input type="hidden" id="postId" name="postId" value="{{$post->id}}">
                    <input type="hidden" id="scheduleId" name="scheduleId" value="{{$schedule->id}}">

                   
                    
                    <button class="btn btn-primary w-100">Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection