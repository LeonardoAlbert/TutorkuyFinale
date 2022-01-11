@extends('layouts.app')

@section('content')
<div class="col-9 mx-auto">
        <h1 style="font-size: 200%;">{{$category->name}}</h1>
        <div class="p-0 mx-auto row">
            @foreach($posts as $post)
                <div class="card col-xs-3 mx-2 " style="width: 15rem">
                    <a href="/posts/{{$post->id}}/details"><img class="card-img-top" src="/storage/{{ $post->postimage }}" alt="Post Image"></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <a href="/users/{{$post->userid}}" class="card-text row">
                            <div class="col-xs-4"><img src="/storage/{{ $post->userimage }}" alt="User Image" class="rounded-circle"></div>
                            <div class="col-xs-8"><p style="  line-height: 40px; height: 40px; text-align: center;" class="card-text col-xs-6">{{$post->name}}</p></div>
                        </a> 
                        <div class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star inline-block" viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                            <p class="inline-block">{{$post->rate}}</p>
                        </div>
                    </div>      
                </div>

                
               
               

               
            @endforeach
        </div>
    </div>
</div>
@endsection