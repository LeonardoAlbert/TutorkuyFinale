@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0">
                <div class="card-body verify-content">
                    <img src="{{ url('/assets', 'darkGray.png') }}" class="logo-form mx-auto d-block" alt="darkGray">
                    <div class="welcome mt-4">Verifikasi Tutor</div>
                    <div class="mx-auto welcome-border mb-4"></div>
                    
                    <strong> file yang dipilih harus dalam bentuk pdf</strong>
                    <p>Harap unggah dokumentasi Tutor Anda.</p>

                    <form action="/verif" method="POST" enctype="multipart/form-data">
					@csrf
    
					<div class="form-group">
						<b>File PDF</b><br/>
						<input type="file" name="fileverif" id="fileverif">
					</div>
 
                    <input type="hidden" id="userId" name="userId" value="{{$user->id}}">
 
					<input type="submit" value="Unggah" class="btn btn-primary w-100 mt-5">
				</form>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection