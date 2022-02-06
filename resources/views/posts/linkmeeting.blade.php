@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0">
                <div class="card-body verify-content">
                    <img src="{{ url('/assets', 'darkGray.png') }}" class="logo-form mx-auto d-block" alt="darkGray">
                    <div class="welcome mt-4">Pembuatan Link Meeting Order</div>
                    <div class="mx-auto welcome-border mb-4"></div>


                    <p>Harap unggah link meeting untuk Kelas Ini</p>

                    <form action="/posts/linkmeeting" method="POST" enctype="multipart/form-data">
					@csrf

                    <div class="form-group">
                        <label for="linkmeeting">Link Meeting</label>
                        <input type="linkmeeting"
                            name="linkmeeting"
                            class="form-control formInput @error('linkmeeting') is-invalid @enderror formInput"
                            value="{{ old('linkmeeting') }}">

                        @error('linkmeeting')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" id="postId" name="postId" value="{{$post->id}}">


					<input type="submit" value="Unggah" class="btn btn-primary w-100 mt-5">
				</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
