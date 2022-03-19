@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0">
                <div class="card-body verify-content">
                    <img src="/storage/logotutorkuy.png" class="logo-form mx-auto d-block" alt="darkGray">
                    <div class="welcome mt-4">Verifikasi Tutor</div>
                    <div class="mx-auto welcome-border mb-4"></div>
                    
                    <strong>File yang dipilih harus dalam bentuk pdf atau zip</strong>
                    <p>Harap unggah dokumentasi Tutor Anda sesuai dengan ketentuan dari halaman sebelumnya.</p>

                    <form action="/verif" method="POST" enctype="multipart/form-data">
					@csrf
    
					<div class="form-group">
						<b>File PDF / ZIP </b><br/>
						<input type="file" name="fileverif" id="fileverif">
					</div>
 
                    <input type="hidden" id="userId" name="userId" value="{{$user->id}}">
 
					{{-- <input type="submit" value="Unggah" class="btn btn-primary w-100 mt-5 rounded-pill"> --}}

                    <button type="button" class="btn btn-primary w-100 mt-5 rounded-pill" data-toggle="modal" data-target="#exampleModalCenter">
                        Unggah
                    </button>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                       Dengan menekan tombol unggah, data anda akan diteruskan ke admin kemudian akan diverifikasi admin dalam waktu 1x24 jam.
                                        <div class="modal-footer">
                                            {{-- <input type="hidden" id="postId" name="postId" value="{{$post->id}}"> --}}
                                            <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Batal</button>
                                            <input type="submit" value="Unggah" class="btn btn-primary w-50 rounded-pill">
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
</div>
@endsection