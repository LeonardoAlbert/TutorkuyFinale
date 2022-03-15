@extends('layouts.app')

@section('content')


<div class="col-md-11 mx-auto mt-5">
    <div class="row">
        <div class="col-md-12 p-0 row mx-auto">
            <div class="col-3 text-center pt-3 pr-0">
                <div class="left-bar-profile shadow-dark rounded px-4">
                
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
                        <div class="text-center pt-3">{{ $user->headline }}</div>
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

                        <div class="text-left pt-3">{{ $user->bio }}</div>
                    </div>
                </div>
            </div>

    <div class="col-9">
        <div class="card shadow-dark p-4">
            <div class="text-primary ml-3 mt-3">Kelas Saya</div>
                <div class="line my-2"></div>
                    <div class="row">
                        @foreach($user->posts as $post)
                            <div class="col-4 card rounded shadow-sm  mt-2">
                                <a href="/posts/{{ $post->id }}/details">
                                    <div class="post-item-inner p-0 m-0">
                                        <div class="card-body p-4">
                                            <img src="/storage/{{$post->image}}" alt="" class="rounded post img-top d-block mx-auto mb-3">
                                            <div class=" text-center p-2 px-3 m-0 w-100">
                                                <div class="text-bold heading">{{ $post->title }}</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection