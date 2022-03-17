@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/path/to/dist/css/image-zoom.css" />

<script src="/path/to/cdn/jquery.min.js"></script>

<script src="/path/to/dist/js/image-zoom.min.js"></script>
<div class="container mt-4">
<div class="card shadow-dark p-4">
  <div class="row">
        <br>
        <h3 class="text-primary">Order Details</h3>
    
  </div>
    <div class="card table-card">
    <div class="table-responsive">
        <table class="table t3">
        <tr>
                <th>
                    Order Name
                </th>
                <td>
                {{ $order->ordername }}
                </td>
            </tr>
            <tr>
                <th>
                    Bank Transfer From
                </th>
                <td>
                {{ Str::upper($order->bankcode) }}
                </td>
            </tr>
            <tr>
                <th>
                    User Account Number
                </th>
                <td>
                {{ $order->banknumber }}
                </td>
            </tr>
            <tr>
                <th>
                    Order Status
                </th>
                <td>
                {{ $order->status}}
                </td>
            </tr>
            <tr>
                <th>
                    Proof of Payment
                </th>
                <td>
                <!-- <input type="checkbox" id="zoomCheck">
                <label for="zoomCheck">
                <img  src="/storage/{{ $order->image }}" alt="" class="rounded post"/> -->
                <a href="{{ route('payment.download', $order->id) }}"><i class="fas fa-download"></i></a>
            </label>
               
                </td>
            </tr>
    </table >
            </div>
           
        </div>
        <div class="row justify-content-center">
            <form action ="/orders/declined"  class="form-inline" method="POST" >
                @csrf
                <input type="hidden" id="orderId" name="orderId" value="{{$order->id}}">
                <input type="submit" value="Decline" class="btn btn-danger" />
            </form> 

            <form action ="/orders/accepted"  class="form-inline" method="POST" >
                @csrf
                <input type="hidden" id="orderId" name="orderId" value="{{$order->id}}">
                <input type="submit" value="Accept" class="btn btn-primary ml-5 text-center" />
            </form> 
        </div>
    </div>  
</div>
</div>




@endsection


