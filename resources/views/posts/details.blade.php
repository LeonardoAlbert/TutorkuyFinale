@extends('layouts.app')

@section('content')

<br>

<div class="container">
<div class="card shadow-dark p-4">
    <div class="row">
    <h3 class="text display-4">{{ $post->title }}</h3>
    
    </div>
    <div class="row">
    <h4 class="text-danger"> ( Terisi {{ $post->count_participant }} / {{$post->participants}}! Daftar Segera! )</h4>
    </div>
          
            <div class="row">
                 <img src="/storage/{{ $post->user->image }}" alt="User Image" class="rounded-circle w-200 ">
        
                    <h5 class="mt-0 font700 text-center mt-2 ml-3"><a href="{{ url("users", $post->user->id) }}"> {{ $post->user->name }}  @if($user->verif == 2)
                        <i class="fa fa-check mr-1"></i>
                        @endif </a></h5>
                    
                    <h5 class="mt-0 text-center mt-2 ml-3">    <i class="fas fa-star"></i>{{$user->rate}} ( {{$user->num_work}} Reviews ) </h5>
             </div>
    <div class="row">
    <img src="/storage/{{ $post->image }}" alt="" class="img width: 100% mt-2  img-thumbnail" width="800px" height="500px">
    </div>

</div>
<div class="card shadow-dark p-4">
    <div class="row">
        <h3 class="text-bold">Tentang Kelas</h3>
    </div>
    <div class="row mt-2">
        <p class="lead">{{ $post->description }} </p>
    </div>
</div>
<div class="card shadow-dark p-4">
    <div class="row">
        <h3 class="text-bold">Harga dan Schedule Kelas</h3>
    </div>
    <div class="row mt-2">
        <h4 class="text-center mt-1">Jumlah Sesi : {{$post->occurrence}} </h4>
    </div>
    <div class="row mt-2">
        <h4 class="text-center mt-1">Harga per Sesi :
        <span class="badge badge-secondary text-center mt-2">Rp. {{ $post->price }}</span>
        </h4>
    </div>
    <div class="row">
    <h4 class="text-center mt-1">Jadwal Kelas</h4>
    </div>
    <div class="row">
        
    @foreach($sched as $sche)
                <div class="col-12">
                    <h4 class="badge badge-primary sub-heading cs">{{$sche->DayofWeek}}, {{$sche->day}} {{$sche->month}} {{$sche->year}} at {{$sche->hour}}:{{$sche->minute}} -  {{$sche->end_hour}}:{{$sche->minute}}  </h4>
                </div>
                @endforeach
                <!-- @if($user->roles == 0)
                <div class="row mt-3">
                    <a href="/orders/{{$post->id}}/create" class="daftar-kelas"> <button type="button" style="width:800px" class="btn btn-primary ">Daftar Kelas</button></a>
                </div>
                @endif -->
    </div>
</div>
<div class="card shadow-dark p-4">
    <div class="row">
        <h3 class="text-bold">Tentang Tutor</h3>
    </div>
    <div class="row mt-2">
        <div class="col-2">
         <img src="/storage/{{$user->image }}" alt="" class=" rounded-circle-lg w-200" style="width:250px " style="height:100px">
        </div>
        <div class="col-10">
        <h3 class="mt-0 font700  mt-2 ml-3"><a href="{{ url("users", $post->user->id) }}"> {{ $post->user->name }}  @if($user->verif == 2)
                        <i class="fa fa-check mr-1"></i>
                        @endif <br> </a>
        <label class="badge badge-primary" style="width:20%;height:35px"><i class="fas fa-star"></i>{{$user->rate}} ( {{$user->num_work}} Reviews )</label>
        </h3>
        <form action="/chat/newRoom" class="form-inline" method="POST">
                    @csrf
                    <input type="hidden" id="tutorId" name="tutorId" value="{{$post->user->id}}">
                    <input type="submit" style="width:250px " value="Kontak Saya" class="btn btn-primary rounded-pill " />
                </form>
        </div>
    </div>
</div>

 @if($user->roles == 0)
                <div class="row mt-3">
                    <a href="/orders/{{$post->id}}/create" class="daftar-kelas"> <button type="button" style="width:1100px" class="btn btn-primary ">Daftar Kelas</button></a>
                </div>
                @endif
</div>
<br>
<!-- <div class="container pb50">
    <div class="row">
        <div class="col-md-9 mb40">
            <article>
                <img src="/storage/{{ $post->image }}" alt="" class="img width: 100% " width="800px" height="400px">
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
                    <button id={{$cs->id}} class="sub-heading cs btn btn-primary mr-3 pt-2"></span>
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

            </div> -->
                
<!-- 
<br>
<div class="container">
    <div class="row">
        <div class="col-3">

            <img src="/storage/{{$post->image}}" alt="img" class="w-100 rounded post img-thumbnail">
            <div class="line mt-2"></div>

            <div class="row">
                <div class="col-3 mt-3"><img src="/storage/{{ $post->user->image }}" alt="User Image" class="rounded-circle w-200"></div>

                <div class="col-9">
                    <div class="row">
                        <h5 class="mt-0 font700 text-center mt-2"><a href="{{ url("users", $post->user->id) }}">{{ $post->user->name }} </i> </a></h5>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary" style="width:30% height:30%"><i class="fas fa-star"></i>{{$user->rate}}</button>
                        @if($user->verif == 2) <button class="btn btn-primary ml-1" style="width:30% height:30%"><i class="fa fa-check mr-1"></i>Verified</button>@endif
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <form action="/chat/newRoom" class="form-inline" method="POST">
                    @csrf
                    <input type="hidden" id="tutorId" name="tutorId" value="{{$post->user->id}}">
                    <input type="submit" style="width:250px " value="Kontak Saya" class="btn btn-primary rounded-pill " />
                </form>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <form action="/chat/newRoom" class="form-inline" method="POST">
                        @csrf
                        <input type="hidden" id="tutorId" name="tutorId" value="{{$post->user->id}}">
                        <input type="submit" style="width:125px " value="Hapus Kelas" class="btn btn-danger rounded-pill " />
                    </form>
                </div>
                <div class="col-6">
                    <form action="/chat/newRoom" class="form-inline" method="POST">
                        @csrf
                        <input type="hidden" id="tutorId" name="tutorId" value="{{$post->user->id}}">
                        <input type="submit" style="width:125px " value="Edit Kelas" class="btn btn-info rounded-pill " />
                    </form>
                </div>
            </div>
        </div>

        <div class="col-9">
            <div class="row">
                <h1>Kelas {{ $post->title }}</h1>
            </div>
            <div class="row mt-3">
                <h5>Terisi {{ $post->count_participant }} / {{$post->participants}}! Daftar Segera!</h5>
            </div>
            <div class="row mt-3">
                <h4> Jadwal Kelas <button class="btn btn-dark rounded-pill " style="width:30% height:30%">@ Rp. {{ $post->price }} </button> </h4>
            </div>
             TODO Rapihin ini -->
            <!-- <div class="row">
                @foreach($css as $cs)
                <div class="col-12">
                    <label class="sub-heading cs">{{$cs->start_date}} - {{$cs->end_date}}</label>
                </div>
                @endforeach
                @if($user->roles == 0)
                <div class="row mt-3">
                    <a href="/orders/{{$post->id}}/create" class="daftar-kelas"> <button type="button" style="width:800px" class="btn btn-primary ">Daftar Kelas</button></a>
                </div>
                @endif
            </div>

            <div class="line mt-2"></div>
        </div>


         </div>
    </div> -->

    <!-- </div>
    <div class="row mt-3">
        <h3 class="text-center">Deskripsi Kelas </h3><br />

    </div>
    <div class="row mt-3">

        <p class="lead">{{ $post->description }} </p>
    </div> -->  

    <!-- <div class="container pb50">
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
                    <button id={{$cs->id}} class="sub-heading cs btn btn-primary mr-3 pt-2"></span>
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
                     -->
    @endsection
