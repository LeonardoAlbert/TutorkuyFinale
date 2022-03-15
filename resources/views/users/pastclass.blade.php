@extends('layouts.app')

@section('content')


<div class="col-md-7 card mx-auto mt-5">
    <h3 class="display-4 text-center mt-3 text-primary">Kelas Yang Telah Selesai</h1>
        @foreach($pastClass as $order)
        <div class="row row-striped card shadow-dark mt-2">
            <div class="row mt-4">
                <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-dark">{{$order->day}}</span></h1>
                    <h3>{{$order->month}}</h3>
                </div>
                <div class="col-10">
                    <h3 class="text-uppercase"><strong><a href="/orders/{{$order->id}}/details">Kelas {{$order->title}} <i class="fa fa-arrow-circle-right" style="color:#1876d1"></i></a></strong></h3>
                    <ul class="list-inline">
                        <br>
                        <li class="list-inline-item"><i class="fa fa-calendar-o " aria-hidden="true"></i> {{$order->DayofWeek}}</li>
                        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$order->hour}}:{{$order->minute}} - {{$order->end_hour}}:{{$order->minute}}</li>
                        @if($order->linkmeeting)
                        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{$order->linkmeeting}}</li>
                        @endif
                        Kelas Selesai <i class="fa fa-circle active" style="color:rgb(96, 151, 14)"></i>
                       </ul>
                </div>
            </div>
        </div>
        @endforeach
        <br><br>
        @empty($pastClass)
        <h4 class="text-center"><span class="text-dark">Belum ada kelas</span></h4>
        @endempty

        @endsection
