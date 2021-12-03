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
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">Oliver Abram</h4> <span class="text-muted">Graphics Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
    @endforeach
    </div>
@endforeach
</div>


















<div class="container">

  
       
      
            
      
           
            
                @foreach($categorytypes as $type)
                
                    <h1 class="d-block" >{{$type->name}}</h1>
                    <div class="row pt-4 d-block el-element-overlay">
                    @foreach($type->categories as $cat)
                    <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">Oliver Abram</h4> <span class="text-muted">Graphics Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- endTest --}}
            
    @endforeach
</div>
{{-- TES  --}}

<div class="container">
<div class="row el-element-overlay">
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">Oliver Abram</h4> <span class="text-muted">Graphics Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">George Acton</h4> <span class="text-muted">Wordpress Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">Harry Addington</h4> <span class="text-muted">Mobile App Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">Emily Adley</h4> <span class="text-muted">Wordpress Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">Sophia Ainsley</h4> <span class="text-muted">Mobile App Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">Lily Ainsworth</h4> <span class="text-muted">Graphics Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">Olivia Alby</h4> <span class="text-muted">Mobile App Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="user">
                                        <div class="el-overlay">
                                            <ul class="list-style-none el-info">
                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="m-b-0">Amelia Allerton</h4> <span class="text-muted">Wordpress Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection