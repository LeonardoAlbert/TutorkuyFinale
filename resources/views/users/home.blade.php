@extends('layouts.app')

@section('content')

<div class="container py-5">
  <!-- For Demo Purpose-->
  <header class="text-center mb-5">
    <h1 class="display-4 font-weight-bold text-primary heading">TutorKuy</h1>
    <p class="font-italic text-muted mb-0">Cari Tutor yang pas, sesuai cara belajar anda!</p>

  </header>

  <div class="container mt-4">
    <div class="row">
        <div class="card shadow-dark p-4">
            <div class="row">
                <div class="col-11">
                <h6 class="text-primary">Kategori Kami</h6>
                </div>
                <div class="col-1">
                <a href="/categories/index" class="btn btn-primary" style="width:100px height:30px">Lainnya</a>
                </div>
            </div>
            <div class="card shadow-dark p-4">
              <div class="row"> 
                @foreach($categories as $category)
                <div class="col-3">
                <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4"><img src="/storage/{{$category->image }}" alt="" class=" w-100 rounded post img-fluid d-block mx-auto mb-3"></div>
                <h5 class=" text-center"> <a href="/categories/{{ $category->id }}" class=" ">{{$category->name}}</a></h5>
                </div>
                </div>
                @endforeach  
              </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="card shadow-dark p-4">
            <div class="row">
                <div class="col-11">
                <h6 class="text-primary">Tutor Kami</h6>
                </div>
                <div class="col-1">
                <a href="/categories/index" class="btn btn-primary" style="width:100px height:30px">Lainnya</a>
                </div>
            </div>
            <div class="card shadow-dark p-4">
              <div class="row"> 
                @foreach($users as $user)
                <div class="col-3">
                  <div class="card rounded shadow-sm border-0">

                    <img src="/storage/{{$user->image }}" alt="" class=" profile-image-main mb-3">

                    <!-- <br><br><br><br><br><br> -->
                      <br><br><br><br><br><br>
                    <div class="row d-flex justify-content-center"> 
                      <h5 class="text-center"> <a href="/users/{{ $user->id }}" class=" ">{{$user->name}}</a>
                      @if($user->verif == 2)
                      <i class="fa fa-check mr-1"></i>
                      @endif</h5>
                    </div>
                    <div class="row d-flex justify-content-center"> 
                      <span class="text-bold text-primary">{{ number_format($user->rate, 1) }}</span>
                      <span class="text-black small-text mt-1">({{ $user->num_work }} Reviews)</span>
                    </div>
                  </div>
                </div>
                @endforeach  
              </div>
            </div>
        </div>
    </div>


    <div class="row">
    <div class="card shadow-dark p-4">
            <div class="row">
                <div class="col-11">
                <h6 class="text-primary">Kelas Kami</h6>
                </div>
                <div class="col-1">
                <a href="/categories/index" class="btn btn-primary mr-3 mb-3" style="width:100px height:30px ">Lainnya</a>
                </div>
            </div>
            <div class="card shadow-dark p-4">
              <div class="row"> 
                @foreach($posts as $post)
                <div class="col-3">
                <div class="card rounded shadow-sm border-0">
                  
                <div class="card-body p-4"><a href="/posts/{{ $post->id }}/details"> <img src="/storage/{{$post->image }}" alt="" class=" w-100 rounded post img-fluid d-block mx-auto mb-3"> </a></div>
                <h5 class=" text-center"> <a href="/posts/{{ $post->id }}/details" class=" ">{{$post->title}}</a></h5>
                </div>
                </div>
                @endforeach  
              </div>
            </div>
        </div>
    </div>

</div>

  

  
@endsection
