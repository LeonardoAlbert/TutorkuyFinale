@extends('layouts.app')

@section('content')

<div class="container mt-4">
<div class="card shadow-dark p-4">
  <div class="row">
    <div class="col-9">
        <br>
        <h3 class="text-primary">Manage Category Request</h3>
  </div>
  <div class="col-3">
 
  </select>
  </div>
  </div>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Category Name</th>
      <th scope="col">Category Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($categories as $category)
      
    <tr>

    <td>{{$loop->iteration}}</td>
      <td>{{$category->categoryname}}</td>
      <td>{{$category->categorytypename}}</td>
      <div>
      <td><a class="btn btn-full2" href="/admin/{{$category->id}}/managecategorydetails"><i class="fa fa-info" aria-hidden="true"></i> </a>
      <a class="btn btn-alt"><i class="fa fa-trash"></i></a>
        </td> 
        @endforeach
    </tr>
   
  </tbody>
</table>
             
</div>
</div>

@endsection