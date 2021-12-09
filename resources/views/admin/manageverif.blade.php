@extends('layouts.app')

@section('content')

<div id="container" class="zone-card2">
    <div class="card title-card">
        <h1>Manage User Verification</h1>
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

      <th scope="row"></th>
      
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


@endsection