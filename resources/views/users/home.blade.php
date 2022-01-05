@extends('layouts.app')

@section('content')

<div class="container py-5">
  <!-- For Demo Purpose-->
  <header class="text-center mb-5">
    <h1 class="display-4 font-weight-bold text-primary">TutorKuy</h1>
    <p class="font-italic text-muted mb-0">Cari Tutor yang pas sesuai cara belajar anda!</p>

  </header>


  <!-- First Row [Prosucts]-->
  <h2 class="font-weight-bold mb-2">Featured Categories</h2>
 

  <div class="row pb-5 mb-4">
  @foreach($category as $category)
    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
      <!-- Card-->
      <div class="card rounded shadow-sm border-0">
        <div class="card-body p-4"><img src="/storage/{{$category->image }}" alt="" class="img-fluid d-block mx-auto mb-3">
          <h5> <a href="/categories/{{ $category->id }}" class="text-dark">{{$category->name}}</a></h5>
         
        </div>
      </div>
      
    </div>
@endforeach
   


  <!-- Second Row [Team]-->
  <h2 class="font-weight-bold mb-2">Featured Tutor</h2>
  

  <div class="row pb-5 mb-4">
  @foreach($category as $category)
    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
      <!-- Card-->
      <div class="card shadow-sm border-0 rounded">
        <div class="card-body p-0"><img src="https://bootstrapious.com/i/snippets/sn-cards/profile-1_dewapk.jpg" alt="" class="w-100 card-img-top">
          <div class="p-4">
            <h5 class="mb-0">Mark Rockwell</h5>
            <p class="small text-muted">CEO - Consultant</p>
            <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item m-0"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
              <li class="list-inline-item m-0"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item m-0"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item m-0"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
@endforeach
   

  <!-- Third Row [Profiles]-->
  <h2 class="font-weight-bold mb-2">Featured Class</h2>
  <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>

  <div class="row pb-5 mb-4">

    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
      <!-- Card-->
      <div class="card rounded shadow-sm border-0">
        <div class="card-body p-0">
          <div class="bg-primary px-5 py-4 text-center card-img-top"><img src="https://bootstrapious.com/i/snippets/sn-cards/teacher-4.jpg" alt="..." width="100" class="rounded-circle mb-2 img-thumbnail d-block mx-auto">
            <h5 class="text-white mb-0">Emma Nevoresky</h5>
            <p class="small text-white mb-0">Elite user</p>
          </div>
          <div class="p-4 d-flex justify-content-center">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"><i class="fa fa-picture-o mr-1 text-primary"></i>Photos</small>
              </li>
              <li class="list-inline-item">
                <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"><i class="fa fa-user-circle-o mr-1 text-primary"></i>Followers</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
      <!-- Card-->
      <div class="card rounded shadow-sm border-0">
        <div class="card-body p-0">
          <div class="bg-success px-5 py-4 text-center card-img-top"><img src="https://bootstrapious.com/i/snippets/sn-cards/teacher-2.jpg" alt="..." width="100" class="rounded-circle mb-2 img-thumbnail d-block mx-auto">
            <h5 class="text-white mb-0">Samuel Hardy</h5>
            <p class="small text-white mb-0">Elite user</p>
          </div>
          <div class="p-4 d-flex justify-content-center">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"><i class="fa fa-picture-o mr-1 text-success"></i>Photos</small>
              </li>
              <li class="list-inline-item">
                <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"><i class="fa fa-user-circle-o mr-1 text-success"></i>Followers</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
      <!-- Card-->
      <div class="card rounded shadow-sm border-0">
        <div class="card-body p-0">
          <div class="bg-info px-5 py-4 text-center card-img-top"><img src="https://bootstrapious.com/i/snippets/sn-cards/teacher-7.jpg" alt="..." width="100" class="rounded-circle mb-2 img-thumbnail d-block mx-auto">
            <h5 class="text-white mb-0">Tom Sunderland</h5>
            <p class="small text-white mb-0">Elite user</p>
          </div>
          <div class="p-4 d-flex justify-content-center">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"><i class="fa fa-picture-o mr-1 text-info"></i>Photos</small>
              </li>
              <li class="list-inline-item">
                <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"><i class="fa fa-user-circle-o mr-1 text-info"></i>Followers</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
      <!-- Card-->
      <div class="card rounded shadow-sm border-0">
        <div class="card-body p-0">
          <div class="bg-warning px-5 py-4 text-center card-img-top"><img src="https://bootstrapious.com/i/snippets/sn-cards/teacher-1.jpg" alt="..." width="100" class="rounded-circle mb-2 img-thumbnail d-block mx-auto">
            <h5 class="text-white mb-0">John Tarly</h5>
            <p class="small text-white mb-0">Elite user</p>
          </div>
          <div class="p-4 d-flex justify-content-center">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"><i class="fa fa-picture-o mr-1 text-warning"></i>Photos</small>
              </li>
              <li class="list-inline-item">
                <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"><i class="fa fa-user-circle-o mr-1 text-warning"></i>Followers</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


  
@endsection
