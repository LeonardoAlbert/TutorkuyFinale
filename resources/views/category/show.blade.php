@extends('layouts.app')

@section('content')
<div class="mt-4 row ">
    <div class="col-9 mx-auto">
        <form action="">
            <div class="row px-2">
                <div class="col-10 p-0 pr-4">
                    <div class="form-group form-group-search">
                        <input name="search" id="search" type="text" class="form-control form-search" value="{{ $search }}">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="col-2 px-0">
                <div class="input-group" >
                </div>
                </div>
</div>
</div>


<div class="container">
    <div class="row">
        <div class="card shadow-dark p-4">
        <h1 class="d-block display-1" style="font-size: 200%; ">{{$category->name}}</h1>
            <div class="row">
            @foreach($posts as $post)
                <div class="card col-xs-12 mx-2 " style="width: 15rem">
                    <a href="/posts/{{$post->id}}/details"><img class="card-img-top" src="/storage/{{ $post->postimage }}" alt="Post Image"></a>
                    <div class="card-body">
                        <h5 class="card-title text-center ">{{$post->title}}</h5>
                        <div class="row text-center"> <span class=" ml-4 text-center text-danger"> Terisi {{ $post->count_participant }} / {{$post->participants}} Peserta </span></div>
                       
                        <div class="row">
                        <a href="/users/{{$post->userid}}" class="card-text row">
                            <div class="col-4"><img src="/storage/{{ $post->userimage }}" alt="User Image" class="rounded-circle"></div>
                            <div class="col-8"><p style=" text-align: center;" class="card-text">{{$post->name}}</p></div>
                        </a> 
                        </div>
                        <div class="row"><br></div>
                        <div class="row">
                       
                        <div class="col-12">

                        <a href="/posts/{{$post->id}}/details" class="btn btn-primary" style="width:100%"><i class="fas fa-star"></i>{{$post->rate}} | Terjual {{$post->num_work}}x</a>
               
                        </div>
                        </div>
                    </div>      
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>


@endsection