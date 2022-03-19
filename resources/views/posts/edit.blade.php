@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 card p-0 mx-auto">
            <div class="card-body">
                <div class="text-primary heading mb-3">Edit Kelas</div>
                <form action="/posts" enctype="multipart/form-data" method="POST" id="create-post-form">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="hidden" name="postId" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="title">Nama Kelas</label>
                        <input type="text" name="title" class="rounded-pill form-control formInput @error('title') is-invalid @enderror formInput" value="{{ old('title', $post->title) }}">

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="line mb-2"></div>
                    <div class="form-group">
                        <label for="image">Foto Kelas</label>
                        <input type="file" name="image" id="image" class="d-block @error('image') is-invalid @enderror" value="{{ old('image', $post->image) }}">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="line mb-2"></div>
                    <div class="form-group">
                        <label for="description">Deskripsi Kelas</label>
                        <textarea name="description" id="description" cols="30" rows="2" class="form-control @error('description') is-invalid @enderror formInput">{{ old('description', $post->description) }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="line mb-2"></div>
                    <div class="form-group row">
                        <div class="col-6 p-0 pr-2">
                            <label for="price">Harga kelas per sesi </label>
                            <input type="number" name="price" id="price" class="rounded-pill form-control formInput @error('price') is-invalid @enderror" value="{{ old('price', $post->price) }}">

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="line mb-2"></div>
                    <div class="form-group row">
                        <div class="col-6 p-0 pr-2">
                            <label for="occurrence">Total Sesi </label>
                            <input type="number" name="occurrence" id="occurrence" class="rounded-pill form-control formInput @error('occurrence') is-invalid @enderror" value="{{ old('occurrence', $post->occurrence) }}">

                            @error('occurrence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="line mb-2"></div>

                    <div class="form-group row">
                        <div class="col-6 p-0 pr-2">
                            <label for="class_duration">Durasi per sesi (jam) </label>
                            <input type="number" name="class_duration" id="class_duration" class="rounded-pill form-control formInput @error('class_duration') is-invalid @enderror" value="{{ old('class_duration', $post->class_duration) }}">

                            @error('class_duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="line mb-2"></div>

                    <div class="form-group row">
                        <div class="col-6 p-0 pr-2">
                            <label for="participants">Jumlah peserta </label>
                            <input type="number" name="participants" id="participants" class="rounded-pill form-control formInput @error('participants') is-invalid @enderror" value="{{ old('participants', $post->participants) }}">

                            @error('participants')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="line mb-2"></div>
                    <div class="text-dark ">Kategori</div>
                    <div class="mb-4 ">
                        <select name="categories" id="categories" class="rounded-pill form-control ">
                            @foreach($categories as $cat)
                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="line mb-2"></div>
                    <!-- TODO: fix this -->
                    <!-- <div class="text-dark ">SubKategori</div>
                    <div class="mb-4 ">
                        <select name="categories" id="csategories" class="form-control ">
                            @foreach($categories as $cat)
                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="line mb-2"></div> -->
                    <div class="form-group row">
                        <div class="my-2 tag-btn mr-2">
                            <label for="schedule">Jadwal Mulai Kelas</label>
                            <input type="datetime-local" name="schedule" id="schedule" class="rounded-pill form-control formInput @error('schedule') is-invalid @enderror" value="{{ old('schedule', $post->schedule) }}">
                        </div>
                    </div>
                    <div class="text-dark ">Note: Jadwal Kelas akan dilakukan dalam waktu yang sama setiap minggu</div>
                    <br><br>
                    {{-- <button class="rounded-pill btn btn-primary w-100">Unggah Kelas</button> --}}
                    <div class="col my-auto">
                        <button type="button" class="btn btn-primary rounded-pill w-100" data-toggle="modal" data-target="#exampleModalCenter">
                            Perbaharui Detail Kelas
                        </button>
                    </div>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin untuk mengubah kelas?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                       Anda akan mengubah detail dari kelas.
                                        <div class="modal-footer">
                                            {{-- <input type="hidden" id="postId" name="postId" value="{{$post->id}}"> --}}
                                            <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Tutup</button>
                                            <input type="submit" value="Perbaharui" class="btn btn-primary w-50 rounded-pill">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
