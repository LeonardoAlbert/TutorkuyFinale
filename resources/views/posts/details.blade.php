@extends('layouts.app')

@section('content')
<div class="col-9 mx-auto">
    
        <div class="p-0 mx-auto row">

            <div class="col-3 px-2 mb-2">
                <a href="/posts/{{ $post->id }}" class="w-100">
                    <img src="/storage/{{ $post->image }} " alt="" class="w-100 rounded post">
                </a>
                <div class="mt-2">
                    <div class="d-flex justify-content-between">
                        <span class="sub-heading">{{ $post->title }}</span>
                        
                    </div>
                    
                    </div>
            </div>
            
            <button action="/posts/{{ $post->id }}" class="btn btn-primary w-100">Hapus Kelas</button>

            
        </div>
    </div>
</div>
@endsection