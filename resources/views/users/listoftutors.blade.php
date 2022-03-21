@extends('layouts.app')

@section('content')
{{-- <div class="mt-4 row">
    <div class="col-9 mx-auto">
        
</div> --}}
            
<br>

<div class="container">    
    <div class="card shadow-dark p-4" style="">
        <h1 style="font-size: 200%;" class="d-block text-primary mb-3" >List of tutors</h1>
        <div class="row el-element-overlay">
            @foreach($tutors as $tutor)
                <div class="col-3">
                    <div class="card rounded shadow-sm border-0" style="height: 210px">
                        <div class="card-body p-4">
                            <div class="el-card-avatar">
                                <a href="/users/{{$tutor->id}}"> 
                                    <img src="/storage/{{$tutor->image}}" alt="img" class="mt-2 rounded post d-block mx-auto mb-3">
                                </a>
                            </div>
                            <div class="el-card-content">
                                <p class="text-center mb-2">{{$tutor->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection