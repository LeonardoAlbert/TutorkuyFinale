@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 card p-0 mx-auto">
            <div class="card-body">
                <div class="text-primary heading mb-3">Kelas Baru</div>
                <form action="/posts/{{ $post->id }}" enctype="multipart/form-data" method="POST" id="edit-post-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" 
                            name="title" 
                            class="form-control formInput @error('title') is-invalid @enderror formInput"
                            value="{{ old('title') }}">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Foto Preview Kelas</label>
                        <input type="file" name="image" id="image" class="d-block @error('image') is-invalid @enderror">
                        
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Deskripsi Kelas</label>
                        <textarea name="description" id="description" cols="30" rows="2" class="form-control @error('description') is-invalid @enderror formInput">{{ old('description') }}</textarea>
                        
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-6 p-0 pr-2">
                            <label for="price">Harga Kelas per jam </label>
                            <input type="number" name="price" id="price" class="form-control formInput @error('price') is-invalid @enderror" value="{{ old('price') }}">
                        
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    <div class="text-dark my-2">Kategori</div>
                    <div class="line mb-2"></div>

                    <div class="mb-4">
                        <select name="categories" id="categories" class="form-control">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                           
                        </select>
                    </div>

                    <!-- <label for="price">Harga Kelas per jam </label> -->
                    <div class="mb-4">
                        <label for="schedule">Jadwal Kelas</label>
                        <input type="datetime-local" name="schedule" id="schedule" class="form-control formInput @error('schedule') is-invalid @enderror" value="{{ old('schedule') }}">
                    </div>
                            


                   
                    
                    <button class="btn btn-primary w-100">Unggah Kelas</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection