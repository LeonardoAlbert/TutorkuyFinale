@extends('layouts.app')

@section('content')


<div class="col-md-11 mx-auto mt-5">
    <div class="row">
        <div class="col-md-12 p-0 row mx-auto">
            <div class="col-3 text-center pt-3 pr-0">
                <div class="left-bar-profile shadow-dark rounded">
                    <img src="/storage/{{$user->image}}" alt="profile" width="50px" height="50px" class="mb-2 profile-image-main border-0">
                    <div class="left-bar-profile-content w-100 ">
                        <div class="text-primary heading mt-2">{{ $user->name }} 
                        @if($user->verif == 2)
                        <i class="fa fa-check mr-1"></i>
                        @endif
                        </div>
                        <label class="badge badge-light rounded-pill full-width" style="font-size: 14px" ><i class="fas fa-star" style="color:#FFD700"></i> {{$user->rate}} x {{$user->num_work}} Ulasan </label>
                        @if($user->city || $user->country)
                            <div class="text-muted mt-2">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                {{ $user->city }}@if($user->city and $user->country), @endif {{$user->country}}
                            </div>
                    @endif
                        <div class="text-center pt-3">
                            {{ $user->headline }}
                            @empty($user->headline)
                                <h6 class="text-center"><span class="text-dark">Belum Ada Headline</span></h6>
                            @endempty
                        </div>
                        <div class="w-100">
                            <span class="rating">
                                <div class="rating-upper" style="width: {{ ($user->rate/5)*100 }}%">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </span>
                        </div>

                        <div class="line w-100 mt-4"></div>

                        <div class="text-left pt-3">
                            {{ $user->bio }}
                            @empty($user->bio)
                                <h6 class="text-center"><span class="text-dark">Belum Ada Bio</span></h6>
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
    <div class="col-9">
        <div class="card shadow-dark p-4 mt-3">
            <div class="text-primary ml-3 mt-3">Kelas Saya</div>
                <div class="line my-2"></div>
                    <div class="row">
                        @foreach($user->posts as $post)
                            <div class="card col-xs-12 mx-2 " style="width: 15rem">
                                <a href="/posts/{{$post->id}}/details"><img class="rounded post img-top d-block mx-auto mt-5" src="/storage/{{$post->image}}" alt="Post Image"></a>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $post->title }}</h5>
                                    <div class="row">
                                        {{-- <br><br> --}}
                                    {{-- <a href="/users/{{$post->userid}}" class="card-text row">
                                        <div class="col-4"><img src="/storage/{{ $post->userimage }}" alt="User Image" class="rounded-circle"></div>
                                        <div class="col-8"><p style=" text-align: center;" class="card-text mt-2">{{$post->name}}</p></div>
                                    </a>  --}}
                                    </div>
                                    {{-- <div class="row"><br></div> --}}
                                    {{-- <div class="row"> --}}
                                        <div class="col-12 justify-content-between ml-4">
                                            {{-- <label class="badge badge-light rounded-pill full-width mt-2" style="font-size: 14px" style="width:100%"><i class="fas fa-star" style="color:#FFD700"></i> {{$post->rate}} x {{$post->num_work}} Ulasan </label> --}}
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
                    </div>
                    @empty($post)
                        <h4 class="text-center"><span class="text-dark">Belum ada kelas</span></h4>
                    @endempty
            </div>
        </div>
    </div>
</div>
@endsection