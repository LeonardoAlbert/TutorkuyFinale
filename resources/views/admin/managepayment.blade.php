@extends('layouts.app')

@section('content')

<div id="container" class="zone-card2">
    <div class="card title-card">
        <h1>Manage Payment</h1>
    </div>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Order Id</th>
      <th scope="col">Order Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($orders as $order)
    <tr>

      <th scope="row"></th>
      <td>OD{{$order->id}}</td>
      <td>{{$order->status}}</td>
      <div>
      <td><a class="btn btn-full2" href="/admin/{{$order->id}}/managepaymentdetails"><i class="fa fa-info" aria-hidden="true"></i> </a>
      <a class="btn btn-alt"><i class="fa fa-trash"></i></a>
        </td> 
      
    </tr>
    @endforeach
  </tbody>
</table>


@endsection