@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12 p-0 row mx-auto">
            <div class="col-3 text-center pt-3 pr-0">
                <div class="left-bar-profile shadow-dark px-4">
                    <img src="/storage/{{$user->image}}" alt="profile" width="130px" class="mb-2 profile-image-main border-0">
                    <div class="left-bar-profile-content w-100">
                        <div class="text-primary heading">{{ $user->name }}</div>
                        

                    

                        @if($user->city || $user->country)
                            <div class="text-muted mt-2">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                {{ $user->city }}@if($user->city and $user->country), @endif {{$user->country}}
                            </div>
                        @endif

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
                            <span class="text-bold text-primary">{{ number_format($user->rate, 1) }}</span>
                            <span class="text-black small-text">({{ $user->num_work }} Reviews)</span>
                        </div>

        

                

                        <div class="line w-100 mt-4"></div>

                        <div class="text-left pt-3">{{ $user->bio }}</div>
                    </div>
                </div>
            </div>

            <div class="col-9 pt-3">
     <div class="w-100">
    <div class="heading px-1">CLASSES</div>
    <div class="line my-2"></div>
    <div class="row">
    @foreach($user->posts()->get() as $post)
           
                <div class="col-4 p-2">
                    <div class="shadow-dark review p-3">
                        <div class="row">
                            <div class="col-2 p-0">
                                <img src="/storage/{{ $post->image }} " alt="" class="w-100 rounded-circle">
                            </div>
                            <div class="col-10">
                            <a href="/posts/{{ $post->id }}/details" class="w-100">
                                <div class="small-text">Project: <span class="text-bold">{{ $post->title }}</span></div>
                            </a>    
                            </div>
                        </div>
                        <div class="review-desc description mt-2"></div>
                        <div class="review-footer small-text text-dark">
                        </div>
                    </div>
                </div>
            
        @endforeach
    </div>
</div>

            </div>
        </div>
    </div>
</div>
@endsection