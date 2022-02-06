@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/path/to/dist/css/image-zoom.css" />

<script src="/path/to/cdn/jquery.min.js"></script>

<script src="/path/to/dist/js/image-zoom.min.js"></script>
<div id="container" class="zone-card2">
    <div class="card title-card">
        <h1>Tutor Verification</h1>
    </div>
    <div class="card table-card">
    <div class="table-responsive">
        <table class="table t3">
        <tr>
                <th>
                   Category Name
                  
                </th>
                <td>
                {{ $category->categoryname }}
                </td>
            </tr>
           
            <tr>
                <th>
                   Category type
                </th>
                
               
                 <td>{{$category->categorytypename}}</td>
                
            </tr>
           
    </table >
            </div>
           
        </div>
        @if($category->statuscategories == 0)
        <div class="row justify-content-center mr-3">
            <form action ="/categories/declined"  class="form-inline" method="POST" >
                @csrf
                <input type="hidden" id="categoryId" name="categoryId" value="{{$category->id}}">
                <input type="submit" value="Decline" class="btn btn-danger" />
            </form> 

            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModalCenter">
               Accept Category
            </button>
        </div>
        @elseif($category->statuscategories == 2)
        <div class="row justify-content-center mr-3">
          <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModalCenter">
              Edit Category
            </button>
        </div>
        @endif
    </div>
  
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Unggah Foto Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form action="/categories/accepted" method="POST" enctype="multipart/form-data">
         @csrf   

               
                <div class="form-group">
                        <label for="image">Foto Category</label><br><br/>
                        <input type="file" name="image" id="image" >
                </div>    
                    

                        <div class="modal-footer">
                         <input type="hidden" id="categoryId" name="categoryId" value="{{$category->id}}">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" value="Unggah" class="btn btn-primary w-50">
                        </div>
                        </div>
                    </div>
             </form>
             
</div>




@endsection


