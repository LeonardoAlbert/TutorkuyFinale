@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12 p-0 row mx-auto">
            <div class="col-3 text-center pt-3 pr-0">
                <div class="left-bar-profile shadow-dark px-4">
                
                    <img src="/storage/{{$user->image}}" alt="profile" width="50px" class="mb-2 profile-image-main border-0">
                    <div class="left-bar-profile-content w-100">
                        <div class="text-primary heading">{{ $user->name }} 
                       
                        @if($user->verif == 2)
                        <i class="fa fa-check mr-1"></i>
                        @endif

                        </div>
                        <button class="btn btn-primary" style="width:80% height:35px"><i class="fas fa-star"></i>{{$user->rate}} ( {{$user->num_work}} Reviews )</button>

                    

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
                           
                            <br><br>
                            
                        </div>

        

                

                        <div class="line w-100 mt-4"></div>

                        <div class="text-left pt-3">{{ $user->bio }}</div>
                    </div>
                </div>
            </div>

            <div class="col-9 pt-3">
     <div class="w-100">
    <div class="heading px-1">Kelas Saya</div>
    <div class="line my-2"></div>
    <div class="row">
    <!-- @foreach($user->posts as $post)
                <div class="col-4 mb-3 " style="width: 15rem">
                    <a href="/posts/{{$post->id}}/details"><img class="card-img-top w-100 post-item-img post" src="/storage/{{ $post->image }}" alt="Post Image"></a>
                    <div class="card-body">
                        <h5 class="card-title text-center ">Kelas {{$post->title}}</h5>
                        <div class="row">
                        
                       

                       
                        
               
                        </div>
                        </div>
                    </div>      
                </div>
            @endforeach -->
    @foreach($user->posts as $post)
        <div class="col-4 mb-3 px-2">
            <a href="/posts/{{ $post->id }}/details">
                <div class="post-item-inner p-0 m-0">
                    <img src="/storage/{{$post->image}}" alt="" class="w-100 post-item-img post">

                    <div class=" text-center p-2 px-3 m-0 w-100">
                        <div class="text-bold heading">{{ $post->title }}</div>
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