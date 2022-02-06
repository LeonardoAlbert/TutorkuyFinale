@extends('layouts.app')

@section('content')


<div class="container">
    <h3 class="display-4 text-center mb-2">Kelas Terdahulu</h1>

        @foreach($pastClass as $order)
        <div class="row row-striped card shadow-dark mt-2">
            <div class="row mt-4">
                <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-primary">{{$order->day}}</span></h1>
                    <h2>{{$order->month}}</h2>
                </div>
                <div class="col-10">
                    <h3 class="text-uppercase"><strong><a href="/orders/{{$order->id}}/details">Kelas {{$order->title}}</a></strong></h3>
                    <ul class="list-inline">
                        <br>
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{$order->DayofWeek}}</li>
                        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$order->hour}}:{{$order->minute}} - {{$order->end_hour}}:{{$order->minute}}</li>
                        @if($order->linkmeeting)
                        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{$order->linkmeeting}}</li>
                        @endif
                    </ul>

                </div>
            </div>
        </div>
        @endforeach


        <br><br>
        <h4><span class="text-dark">Belum ada jadwal kelas terdaftar</span></h4>

        @endsection
