@extends('layouts.app')

@section('content')

<div class="container">
@foreach($categorytypes as $type)   
    <h1 class="d-block" >{{$type->name}}</h1>
    <div class="row el-element-overlay">
                        @foreach($type->categories as $cat)
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="/storage/{{$cat->image}}" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="/categories/{{$cat->id}}"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="mt-2 ml-3">{{$cat->name}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
    @endforeach
    </div>
@endforeach
</div>

@endsection