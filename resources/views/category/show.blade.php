@extends('layouts.app')

@section('content')
<div class="mt-4 row ">
    <div class="col-9 mx-auto">
        {{-- <form action="">
            <div class="row px-2">
                <div class="col-10 p-0 pr-4">
                    <div class="form-group form-group-search">
                        <input name="search" id="search" type="text" class="form-control form-search rounded-pill" placeholder="Cari dan tekan enter" value="{{ $search }}">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="col-2 px-0">
                <div class="input-group" >
                    <h1 class="font-weight-bold text-primary heading mt-2" style="font-size:20px">Cari Kategori</h1>
            </div>
        </div> --}}
    </div>
</div>
<div class="container">
    <div class="col-md-12 mx-auto mt-2">
        <div class="card shadow-dark p-3">
            {{-- <div class="card shadow-dark rounded-pill"> --}}
                <form action="" class="" style="margin:0px">
                    <div class="row px-2">
                        <div class="col-10 p-0 pr-4">
                            <div class="form-group form-group-search">
                                <input name="search" id="search" type="text" class="form-control form-search rounded-pill" placeholder="Cari dan tekan enter" value="{{ $search }}">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        {{-- <div class="col-2 px-0">
                            <div class="input-group" >
                                <h1 class="font-weight-bold text-primary heading" style="font-size:20px">Cari Kategori</h1>
                            </div>
                        </div> --}}
                </form>
            {{-- </div> --}}
        </div>
            <h1 class="d-block display-1 text-primary text-bold text-center" style="font-size: 200%; ">{{$category->name}}</h1>
            <br>
            <div class="row">
            @foreach($posts as $post)
                <div class="card col-xs-12 mx-2 " style="width: 15rem">
                    <a href="/posts/{{$post->id}}/details"><img class="card-img-top" src="/storage/{{ $post->postimage }}" alt="Post Image"></a>
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$post->title}}</h5>
                        <div class="row">
                            {{-- <br><br> --}}
                        <a href="/users/{{$post->userid}}" class="card-text row">
                            <div class="col-4"><img src="/storage/{{ $post->userimage }}" alt="User Image" class="rounded-circle"></div>
                            <div class="col-8"><p style=" text-align: center;" class="card-text mt-2">{{$post->name}}</p></div>
                        </a> 
                        </div>
                        {{-- <div class="row"><br></div> --}}
                        {{-- <div class="row"> --}}
                            <div class="col-12 justify-content-between ml-4">
                                <label class="badge badge-light rounded-pill full-width mt-2" style="font-size: 14px" style="width:100%"><i class="fas fa-star" style="color:#FFD700"></i> {{$post->rate}} x {{$post->num_work}} Ulasan </label>
                                @if ($post->count_participant == $post->participants)
                                    <span class="badge badge-light text-center text-danger mt-1"> Terisi {{ $post->count_participant }} / {{$post->participants}} Peserta </span>
                                @else
                                    <span class="badge badge-dark text-center text-light mt-1"> Terisi {{ $post->count_participant }} / {{$post->participants}} Peserta </span>
                                @endif
                                <div class="btn btn-primary rounded-pill full-width justify-content-between " style="margin: 0.7em" onclick="location.href='/posts/{{$post->id}}/details'">
                                    <h6 class="text" style="margin: 0%;">Detail <i class="fa fa-arrow-circle-right" style="color:#d8d8d8"></i></h6>
                                </div>
                            {{-- <a href="/posts/{{$post->id}}/details" class="btn btn-primary" style="width:100%"><i class="fas fa-star"></i>{{$post->rate}} | Terjual {{$post->num_work}}x</a> --}}
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            @endforeach
            @empty($post)
            {{-- <div class="col-12"> --}}
                
                <h4 class="text-center"><span class="text-dark">Belum ada kelas</span></h4>
           
            @endempty
            {{-- </div> --}}
            
        </div>
    </div>
</div>


@endsection