@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card shadow-dark p-4">
                <div class="row">
                    <div class="col-1 p-0">
                        <img src="/storage/{{ $orders->image }}" alt=""> 
                    </div>
                    <div class="col-11">
                        <a href="/posts/{{$orders->post_id}}/details" class="text-black">{{ $orders->title }}</a>
                        <div class="text-dark my-1">
                            
                            
                            
                        </div>
                    </div>
                </div>
                
                <div class="mt-3">
                    <span class="text-bold">Class Description </span><span>{{$orders->description}}</span>
                </div>
            <div><span class="text-bold">Class Price: </span><span> {{$orders->price}}</span></div>
            <div><span class="text-bold">Class Status: </span><span> {{$orders->status}}</span></div>
            <div><span class="text-bold">Class Schedules: </span><span> {{$orders->schedule}}</span></div>
            @if($orders->linkmeeting)
            <div><span class="text-bold">Class link meeting: </span><span> <a href="{{$orders->linkmeeting}}"> {{$orders->linkmeeting}}</a></span></div>
            @endif
            <div><span class="text-bold">Class Material </span><span>  <a href="{{ route('material.download', $orders->id) }}"><i class="fas fa-download"></i></a></span></div>
            <div class="row">
               
                
               
                <div class="col-2">
                    <a href="/orders/{{$orders->id}}/createlinkmeeting" class="btn btn-primary">Buat Link Video Conference</a>
                </div>
               
                
                <div class="col-2">
                    <form action ="/orders/ended"  class="form-inline" method="POST" >
                    @csrf
                    <input type="hidden" id="orderId" name="orderId" value="{{$orders->id}}">
                    <input type="submit" value="Selesai" class="btn btn-primary" />
                    </form> 
                </div>
              

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Upload Meeting Material
                </button>

      
            </div>
        </div>
    </div>
   
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Unggah Material Meeting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form action="/orders/uploadmaterial" method="POST" enctype="multipart/form-data">
         @csrf   

               
                <div class="form-group">
                        <label for="image">Bahan Material Meeting</label><br><br/>
                        <input type="file" name="material" id="material" >
                </div>    
                    

                        <div class="modal-footer">
                         <input type="hidden" id="orderId" name="orderId" value="{{$orders->id}}">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" value="Unggah" class="btn btn-primary w-50">
                        </div>
                        </div>
                    </div>
             </form>
</div>

</div>
@endsection