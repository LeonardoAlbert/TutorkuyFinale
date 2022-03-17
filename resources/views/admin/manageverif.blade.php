@extends('layouts.app')

@section('content')

<div class="container mt-4">
<div class="card shadow-dark p-4">
  <div class="row">
        <br>
        <h3 class="text-primary">Manage User Verification</h3>
    
  </div>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">User Id</th>
      <th scope="col">User Name</th>
      <th scope="col">User Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
      @if($user->verif== 1) 
    <tr>

   <td> {{$loop->iteration}}</td>
      
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>Waiting for Verification</td>
      <div>
      <td><a class="btn btn-full2" href="/admin/{{$user->id}}/manageverifdetails"><i class="fa fa-info" aria-hidden="true"></i> </a>
      <a class="btn btn-alt"><i class="fa fa-trash"></i></a>
        </td> 
      
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
</div>
</div>


@endsection