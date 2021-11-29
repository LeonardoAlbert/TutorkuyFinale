@extends('layouts.app')

@section('content')
<div class="mt-4 row">
    <div class="col-12 col-md-6 col-lg-4 p-2 ml-10">
        <div class="p-0 mx-auto row">
        @foreach($categorytypes as $type)
        <h1 class="d-block" >{{$type->name}}</h1>
        <div class="row pt-4 ">
            @foreach($type->categories as $cat)
            <div class="card">
                <div class="col-3 pt-2">
                    <div class="card" style="width: 9rem;">
                        <a href="/posts/{{ $cat->id }}" class="-100">
                            <img src="/storage/{{ $cat->image }}" alt="" class="rounded post">
                        </a>
                    </div>
                    <div class="mt-2 mb-2">
                        <div class="d-flex justify-content-between">
                            <span class="sub-heading"> {{ $cat->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection