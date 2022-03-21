@extends('layouts.app')

@section('content')
{{-- <div class="mt-4 row">
    <div class="col-9 mx-auto">
        
</div> --}}
            
<br>

<div class="container">    
    <div class="card shadow-dark p-4" style="">
        <h1 style="font-size: 200%;" class="d-block text-center text-primary mb-3" >List of tutors</h1>
        <form action="" class="" style="margin:0px">
            <div class="row px-5 align-self-center">
                <div class="col-10 p-0 pr-4">
                    <div class="form-group form-group-search">
                        <input name="search" id="search" type="text" class="form-control form-search rounded-pill" placeholder="Cari dan tekan enter" value="{{ $search }}">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
        </form>
        {{-- <div class="row el-element-overlay">
            @foreach($tutors as $tutor)
                <div class="card col-xs-12 mx-2 " style="width: 15rem">
                    <a href="/users/{{$tutor->id}}"> 
                        <img src="/storage/{{$tutor->image}}" alt="img" class="mt-3 rounded post d-block mx-auto mb-3">
                    </a>
                    <div class="card-body text-center">
                        <div class="el-card-content">
                            <p class="mb-2">{{$tutor->name}}</p>
                            <label class="badge badge-pill rounded-pill full-width mt-2" style="font-size: 14px;" style="width:100%"><i class="fas fa-star" style="color:#FFD700"></i> {{round($tutor->rate,1)}} x {{$tutor->num_work}} Ulasan </label>
                        </div>                        
                        <div class="btn btn-primary rounded-pill full-width justify-content-between " style="margin: 0.7em; " onclick="location.href='/users/{{$tutor->id}}'">
                            <h6 class="text" style="margin: 0%;">Detail <i class="fa fa-arrow-circle-right" style="color:#d8d8d8"></i></h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}

        <div class="row"> 
            @foreach($tutors as $tutor)
            <div class="col-3">
              <div class="card rounded shadow-sm border-0 mt-5 text-center">
                <a href="/users/{{$tutor->id}}" class="">
                <img src="/storage/{{$tutor->image}}" alt="" class=" profile-image-main mb-3">
                <br><br><br><br><br>
              </a>
                <div class="row d-flex justify-content-center"> 
                  <h5 class="text-center"> <a href="/users/{{ $tutor->id }}" class=" ">{{$tutor->name}}</a>
                  @if($tutor->verif == 2)
                  <i class="fa fa-check mr-1"></i>
                  @endif</h5>
                </div>
                <div class="row d-flex justify-content-center"> 
                  {{-- <span class="text-bold text-primary">{{ number_format($user->rate, 1) }}</span> --}}
                  <label class="badge badge-light rounded-pill full-width" style="font-size: 14px" ><i class="fas fa-star" style="color:#FFD700"></i> {{round($tutor->rate,1)}} x {{$tutor->num_work}} Ulasan </label>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="btn btn-primary rounded-pill full-width justify-content-between" style="margin: 0.7em; width:100px" onclick="location.href='/users/{{$tutor->id}}'">
                        <h6 class="text" style="margin: 0%;">Detail <i class="fa fa-arrow-circle-right" style="color:#d8d8d8"></i></h6>
                    </div>
                </div>
                {{-- <div class="btn btn-primary rounded-pill full-width justify-content-between" style="margin: 0.7em; width:100px" onclick="location.href='/users/{{$tutor->id}}'">
                    <h6 class="text" style="margin: 0%;">Detail <i class="fa fa-arrow-circle-right" style="color:#d8d8d8"></i></h6>
                </div> --}}
              </div>
            </div>
            @endforeach  
          </div>
    </div>
</div>
@endsection