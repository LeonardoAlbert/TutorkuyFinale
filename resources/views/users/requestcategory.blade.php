@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 card p-0 mx-auto">
            <div class="card-body">
                <div class="text-primary heading mb-3">Ajukan Kategori Baru</div>
                <form action="/categories/request" enctype="multipart/form-data" method="POST" id="create-post-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Kategori Baru</label>
                        <input type="text" 
                            name="name" 
                            class="form-control formInput @error('name') is-invalid @enderror formInput"
                            value="{{ old('name') }}">
                            <div class="line mb-2"></div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-dark my-2">Kategori</div>
                 

                    <div class="mb-4">
                        <select name="type" id="type" class="form-control">
                            @foreach($categorytypes as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                           
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="type">Tipe Kategori</label>
                        <select name="type" id="type" class="form-control" id="exampleFormControlSelect1">
                        <option>Materi Kelas SMP</option>
                        <option>Materi Kelas SMA</option>
                        <option>Materi Kuliah</option>
                        </select>
                    </div> -->
             
                
                    
                    <!-- </div> -->
                 

                   <button class="btn btn-primary w-100">Unggah</button> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection