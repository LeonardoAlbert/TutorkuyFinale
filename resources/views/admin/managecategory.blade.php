@extends('layouts.app')

@section('content')

<div id="container" class="zone-card2">
<br>
  <div class="row">
    <div class="col-9">
        <br>
        <h3 class="text-primary">Manage Category Request</h3>
  </div>
  <div class="col-3">
  <form>
  <select class="select4 btn btn-primary mt-3 " value="asd" name="country" id="country">
  <option value="req">Request Category</option>
  <option value="exist">Manage Existing Category</option>
  </form>
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

      <th scope="row"></th>
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

@endsection