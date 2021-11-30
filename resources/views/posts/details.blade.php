@extends('layouts.app')

@section('content')
<div class="col-9 mx-auto">
    
        <div class="p-0 mx-auto row">
            <h1>t
            <div class="col-3 px-2 mb-2">
                <a href="/posts/{{ $post->id }}" class="w-100">
                    <img src="/storage/{{ $post->image }} " alt="" class="w-100 rounded post">
                    <div class="text-muted mb-3">By <a href="{{ url("users", $post->user->id) }}" class="text-muted">{{ $post->user->name }}</a></div>
                </a>
                <div class="mt-2">
                    <div class="d-flex justify-content-between">
                        <span class="sub-heading">{{ $post->title }}</span>
                        <div class="text-left pt-3">{{ $post->description }}</div>
                    </div>
                    
                    </div>
            </div>
            
            <a href="/orders/{{$post->id}}/create" class="btn btn-primary w-100">Daftar Kelas</button>

            
        </div>
    </div>
</div>
@endsection