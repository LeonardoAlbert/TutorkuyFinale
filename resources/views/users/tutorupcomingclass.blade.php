@extends('layouts.app')

@section('content')


<div class="col-md-7 card mx-auto mt-5">
    <h3 class="display-4 text-center mt-3 text-primary mt-5">Kelas Yang Akan Datang</h1>
        @foreach($upCommingClass as $order)
        <div class="row row-striped card shadow-dark mt-2">
            <div class="row mt-4">
                <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-warning">{{$order->day}}</span></h1>
                    <h3>{{$order->month}}</h3>
                </div>
                <div class="col-10 d-flex justify-content-between">
                    <h3 class="text-uppercase"><strong>Kelas {{$order->title}} 
                        <br> 
                        <div class="btn btn-primary rounded-pill mt-2" onclick="location.href='/orders/{{$order->id}}/details'">
                        <h6 class="text" style="margin-bottom: 0px;">Detail <i class="fa fa-arrow-circle-right" style="color:#d8d8d8"></i></h6></div></strong>   
                    </h3>
                    <ul class="list-inline">
                        <br>
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true" style="color:#0d47a0"></i> {{$order->DayofWeek}}</li> <br>
                        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true" style="color:#0d47a0"></i> {{$order->hour}}:{{$order->minute}} - {{$order->end_hour}}:{{$order->minute}}</li><br>
                        @if($order->linkmeeting)
                        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{$order->linkmeeting}}</li>
                        @else
                        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true" style="color:#0d47a0"></i> (Belum Tersedia)</li>
                        @endif
                    </ul>

                </div>
            </div>
        </div>
        @endforeach


        <br><br>
        @empty($upCommingClass)
        <h4><span class="text-dark">Belum ada jadwal kelas terdaftar</span></h4>
        @endempty
@endsection
