@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 card p-0 mx-auto">
            <div class="card-header text-primary">Edit Profile
            @if(auth()->user()->role == 1)
            <a href="/createverif/" class="btn btn-primary float-md-right">Mengajukan sebagai <i>Verified Tutor</i></a>
            @else
            @endif
            </div>
            <div class="card-body">
                <form action="/users/{{ $user->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <div class="col-3">
                            <img src="/storage/{{$user->image}}" alt="profile" class="rounded-circle-lg border-gray profilepic ">
                        </div>
                       
                        <div class="col-9">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" 
                                    name="name" 
                                    class="form-control formInput @error('name') is-invalid @enderror formInput"
                                    value="{{ old('name') ?? $user->name }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6">
                                    <label for="image">Foto Profil</label>
                                    <input type="file" 
                                        name="image" 
                                        id="image" 
                                        class="d-block @error('image') is-invalid @enderror"
                                        value="{{ old('image') ?? $user->image }}">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
  
                            <div class="form-group row">
                                
                                <div class="col-6">
                                    <label for="city">Kota</label>
                                    <input type="text" 
                                        name="city" 
                                        id="city" 
                                        class="form-control formInput @error('city') is-invalid @enderror"
                                        value="{{ old('city') ?? $user->city }}">
                                        
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="country">Negara</label>
                                    <input type="text" 
                                        name="country" 
                                        id="country" 
                                        class="form-control formInput @error('country') is-invalid @enderror"
                                        value="{{ old('country') ?? $user->country }}">

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="headline">Headline <span class="text-muted">(max: 150)</span></label>
                            <textarea name="headline" 
                                id="headline" 
                                cols="30" 
                                rows="2" 
                                class="form-control formInput @error('headline') is-invalid @enderror">{{ old('headline') ?? $user->headline }}</textarea>

                            @error('headline')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="bio">Bio <span class="text-muted">(max: 350)</span></label>
                        <textarea name="bio" 
                            id="bio" 
                            cols="30" 
                            rows="2" 
                            class="form-control formInput @error('bio') is-invalid @enderror">
                            {{ old('bio') ?? $user->bio }}
                        </textarea>

                        @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary form-control mt-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection