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
                            class="form-control formInput @error('name') is-invalid @enderror formInput rounded-pill"
                            value="{{ old('name') }}">
                            {{-- <div class="line mb-2"></div> --}}
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text my-2">Kategori</div>
                    <div class="mb-4">
                        <select name="type" id="type" class="form-control rounded-pill">
                            @foreach($categorytypes as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                   <button class="btn btn-primary w-100 rounded-pill">Minta</button> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection