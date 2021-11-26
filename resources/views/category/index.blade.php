@extends('layouts.app')

@section('content')
<div class="mt-4 row">
    <div class="col-9 mx-auto">
        <div class="p-0 mx-auto row">
        @foreach($categorytypes as $type)
        <h1 class="d-block" >{{$type->name}}</h1>
        <div class="row pt-4 ">
            @foreach($type->categories as $cat)
                <div class="col-3 px-2 mb-2">
                    <a href="/posts/{{ $cat->id }}" class="w-100">
                        <img src="/storage/{{ $cat->image }}" alt="" class="w-100 rounded post">
                    </a>
                    <div class="mt-2">
                        <div class="d-flex justify-content-between">
                            <span class="sub-heading"> {{ $cat->name }}</span>
                        </div>
                       
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection