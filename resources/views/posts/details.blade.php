@extends('layouts.app')

@section('content')

<div class="container pb50">
    <div class="row">
        <div class="col-md-9 mb40">
            <article>
                <img src="/storage/{{ $post->image }}" alt="" class="img width: 100% thumbnail" width="800px" height="400px">
                <div class="post-content">
                    <h3>{{ $post->title }}</h3>
                    <ul class="post-meta list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-user-circle-o"></i> <a href="{{ url("users", $post->user->id) }}">{{ $post->user->name }}</a>
                        </li>
                        <li class="list-inline-item">
                        <span class="text-bold text-primary">{{ number_format($user->rate, 1) }}</span>
                            <span class="text-black small-text">({{ $user->num_work }} Reviews)</span>
                        </li>
                       
                    </ul>
                    <h4 class="font500">Class Description</h4>
                    <p class="lead">{{ $post->description }} </p>
                    <hr class="mb40">

                    
                    <h4 class="font500">Class Price</h4>
                    <p class="lead">Rp.{{ $post->price }} </p>
                    <div class="line mb-2"></div>

                    <h4 class="mb40 text-uppercase font500">Class Schedule  </h4><p class="text-dark " style="font-size=4px;"> *setiap kelas berdurasi 1 jam </p>
                   


                    <div class="media mb40">
                    @foreach($css as $cs)
                    <div class="d-flex justify-content-between">
                    @if($cs->post_id == $post->id)
                    <button id={{$cs->id}} class="sub-heading cs btn btn-primary mr-3 pt-2">{{$cs->schedule}}</span>
                    @endif 
                    </div>
                    
                    @endforeach
                    </div>
                    </div>
                    <hr class="mb40">
                    <h4 class="mb40 text-uppercase font500">About the Tutor</h4>
                    <div class="media mb40">
                    
                        <i class="d-flex mr-3 fa fa-user-circle fa-5x text-primary"></i>
                        <div class="media-body">
                            <h5 class="mt-0 font700"><a href="{{ url("users", $post->user->id) }}">{{ $post->user->name }}</a></h5>
                            <span class="rating">
                            <div class="rating-upper" style="width: {{ ($user->rate/5)*100 }}%">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <div class="rating-lower">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </span>
                            <span class="text-bold text-primary">{{ number_format($user->rate, 1) }}</span>
                            <span class="text-black small-text">({{ $user->num_work }} Reviews)</span>
                            <div class="row">
                            <form action ="/chat/newRoom"  class="form-inline" method="POST" >
                            @csrf
                            <input type="hidden" id="tutorId" name="tutorId" value="{{$post->user->id}}">
                             <input type="submit" value="Contact Me" class="btn ml-5 btn-primary" />
                            </form> 
                            </div>
                        </div>
                  
            </div>
            <br><br><br>
            <a href="/orders/{{$post->id}}/create" class="daftar-kelas"> <button type="button" class="btn btn-primary w-100">Daftar Kelas</button></a>
            
            </div>
                    
@endsection
