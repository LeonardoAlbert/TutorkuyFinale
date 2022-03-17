@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <div class="card">
                <div class="card-body verify-content">
                    {{-- <img src="{{ url('/assets', 'darkGray.png') }}" class="logo-form mx-auto d-block" alt="darkGray"> --}}
                    <div class="welcome mt-4">Link Meeting</div>
                    <div class="mx-auto welcome-border mb-4"></div>

                    <form action="/posts/linkmeeting" method="POST" enctype="multipart/form-data">
					@csrf

                    <div class="form-group">
                        <label for="linkmeeting">Harap unggah link meeting untuk kelas ini:</label>
                        <input type="linkmeeting"
                            name="linkmeeting"
                            class="form-control formInput @error('linkmeeting') is-invalid @enderror formInput rounded-pill"
                            value="{{ old('linkmeeting') }}">

                        @error('linkmeeting')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" id="postId" name="postId" value="{{$post->id}}">
					<input type="submit" value="Unggah" class="btn btn-primary w-100 mt-5 rounded-pill">
				</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
