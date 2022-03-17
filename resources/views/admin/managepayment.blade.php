@extends('layouts.app')

@section('content')

<div class="container mt-4">
<div class="card shadow-dark p-4">
  <div class="row">
        <br>
        <h3 class="text-primary">Manage Payment Order</h3>    
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
          <td>{{$loop->iteration}}</td>
            <td>OD{{$order->id}}</td>
            <td>{{$order->status}}</td>
            <td><a class="btn btn-full2" href="/admin/{{$order->id}}/managepaymentdetails"><i class="fa fa-info" aria-hidden="true"></i> </a>
            <a class="btn btn-alt"><i class="fa fa-trash"></i></a>
          </td>         
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection