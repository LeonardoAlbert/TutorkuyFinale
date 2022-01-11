@extends('layouts.app')

@section('content')
<div class="mt-4 row">
    <div class="col-9 mx-auto">
        <form action="">
            <div class="row px-2">
                <div class="col-10 p-0 pr-4">
                    <div class="form-group form-group-search">
                        <input name="search" id="search" type="text" class="form-control form-search" value="{{ $search }}">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="col-2 px-0">
                 <div class="input-group" >
     
       <div class="input-group-btn" >
        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><span class="label-icon" >Filter</span> <span class="caret" >&nbsp;</span></button>
        <div class="dropdown-menu dropdown-menu-right" >
           <ul class="category_filters" >
           <li >
             <input class="cat_type category-input" data-label="All" id="all" value="" name="radios" type="radio" ><label for="all" >All</label>
            </li>
           @foreach($allcategorytypes as $alltype)   
           <li >
             <input type="radio" name="radios" id="Design" value="Design" ><label class="category-label" for="" >{{$alltype->name}}</label>
            </li>
            @endforeach
            
        </div></div></div></div></div>
</div>


            
</form>
<div class="container">
@foreach($categorytypes as $type)   
    <h1 style="font-size: 200%;" class="d-block" >{{$type->name}}</h1>
    <div class="card shadow-sm p-4" style="background-color: lightgray;">
        <div class="row el-element-overlay">
            @foreach($categories as $cat)
                @if($cat->category_type_id == $type->id) 
                        <div class="col-xs-3 mx-2">
                            <div class="card" style="width: 15rem">
                                <div class="el-card-item">
                                    <div class="el-card-avatar">
                                        <a href="/categories/{{$cat->id}}"> 
                                            <img src="/storage/{{$cat->image}}" alt="img" class="w-100 rounded post">
                                        </a>
                                    </div>
                                    <div class="el-card-content">
                                        <p class="mt-2 ml-3">{{$cat->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
            @endforeach
        </div>
    </div>
@endforeach
</div>

@endsection