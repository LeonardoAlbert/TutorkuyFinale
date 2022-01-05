@extends('layouts.app')

@section('content')
<div class="col-9 mx-auto">
        <h1>{{$category->name}}</h1>
        <div class="p-0 mx-auto row">
            @foreach($posts as $post)
                <div class="col-3 px-2 mb-2">
                    <a href="/posts/{{ $post->id }}/details" class="w-100">
                        <img src="/storage/{{ $post->postimage }} " alt="" class="w-100 rounded post">
                    </a>
                    <div class="mt-2">
                    <span class="sub-heading">{{ $post->title }}</span>
                        <div class="d-flex justify-content-between">
                        <div class="my-1 small-text"><a href="/users/{{ $post->userid }}" class="text-primary"></a></div>
                            
                        </div>
                       
                           
                        </div>
                </div>
               
               

               
            @endforeach
        </div>
    </div>
</div>
@endsection