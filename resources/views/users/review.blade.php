@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center mt-5">
    <div class="col-9">
    <br><br><br><br><br>
    <h4 class="text-left font-weight-bold">Halo,</h4>
    <br><br>

    <h5 class="text-left">Pendapatmu sangat berarti bagi kami.<br>
        Silakan nilai kelas anda yang telah berakhir.</h5>
        <br><br>
        <h5 class="text-left">Terimakasih.</h5>
    </div>

    <div class="col-3">
  

    <div class="card text-center mb-5">
    <img class="card-img-top" src="/storage/{{$user->image}}" alt="Card image cap">
    
        <span class="dot"><br><br></span> <span class="name mb-1 fw-500">{{$user->name}}</span> 
        @if($user->city || $user->country)
        
        <div class="location mt-4"> 
            <span class="d-block">
                <i class="fa fa-map-marker-alt">

                </i> 
                <small class="text-truncate ml-2"> {{ $user->city }}@if($user->city and $user->country), @endif {{$user->country}}</small> </span> <span></span> </div>
        @endif
        <form action ="/users/review/submit"   method="POST" >
            @csrf
            <h6 class="mb-0">Berikan Rating:</h6>
            <input type="hidden" id="userId" name="userId" value="{{$user->id}}">
            <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> </div>
            <div class="buttons px-4 mt-0"> <input type="submit" value="submit" class="btn btn-primary btn-block rating-submit" /> </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection