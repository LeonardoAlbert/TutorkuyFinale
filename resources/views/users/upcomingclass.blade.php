@extends('layouts.app')

@section('content')


<div class="col-md-7 card mx-auto mt-5">
    <h3 class="display-4 text-center mb-2 mt-3 text-primary">Kelas Yang Akan Datang</h1>

        @foreach($upCommingClass as $order)
        <div class="row row-striped card shadow-dark mt-2">
            <div class="row mt-4">
                <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-primary">{{$order->day}}</span></h1>
                    <h2>{{$order->month}}</h2>
                </div>
                <div class="col-10">
                    <h3 class="text-uppercase"><strong><a href="/orders/{{$order->id}}/details">Kelas {{$order->title}} <i class="fa fa-arrow-circle-right" style="color:#1876d1"></i></a></strong></h3>
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
        @empty($upCommingClass)
        <h4 class="text-center"><span class="text-dark">Belum ada kelas</span></h4>
        @endempty
@endsection
