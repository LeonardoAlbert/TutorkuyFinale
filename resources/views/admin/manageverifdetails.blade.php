@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/path/to/dist/css/image-zoom.css" />

<script src="/path/to/cdn/jquery.min.js"></script>

<script src="/path/to/dist/js/image-zoom.min.js"></script>
<div id="container" class="zone-card2">
    <div class="card title-card">
        <h1>Tutor Verification</h1>
    </div>
    <div class="card table-card">
    <div class="table-responsive">
        <table class="table t3">
        <tr>
                <th>
                   Tutor Name
                </th>
                <td>
                {{ $user->name }}
                </td>
            </tr>
            @if($user->city )
            <tr>
                <th>
                   Kota Tutor
                </th>
                <td>
                {{$user->city}}
                </td>
            </tr>
            @endif
            <tr>
                <th>
                    Tutor Verification Status
                </th>
                <td>
                     {{$user->verif}}
                </td>
            </tr>
            <tr>
                <th>
                    Bukti Kualifikasi Tutor
                </th>
                <td>
                <a href="{{ route('verif.download', $user->id) }}"><i class="fas fa-download"></i></a>

                </td>
            </tr>
    </table >
            </div>
           
        </div>
        <div class="row justify-content-center">
            <form action ="/users/verifdeclined"  class="form-inline" method="POST" >
                @csrf
                <input type="hidden" id="userId" name="userId" value="{{$user->id}}">
                <input type="submit" value="Decline" class="btn btn-danger" />
            </form> 

            <form action ="/users/verifaccepted"  class="form-inline" method="POST" >
                @csrf
                <input type="hidden" id="userId" name="userId" value="{{$user->id}}">
                <input type="submit" value="Accept" class="btn ml-5 btn-primary" />
            </form> 
        </div>
    </div>
  
</div>




@endsection


