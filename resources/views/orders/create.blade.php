@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- BEGIN INVOICE -->
        <div class="col-md-9 mx-auto mt-5">
            <div class="card card-2">
                <div class="card-header bg-white">
                    <div class="grid invoice">
                        <div class="grid-body">
                            <div class="invoice-title">
                                <div class="row">
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="text-primary"><strong>Pesanan Anda</strong><br>
                                            {{-- <span class="small">Pesanan Anda</span> --}}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card card-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <address>
                                                <div class="text-primary">Tertagih kepada :</div>
                                                Nama    : {{$user->name}}<br>
                                                Email   : {{$user->email}}<br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="card card-2">
                               <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-12"> --}}
                                    <h3 class="text-primary">Rincian Pesanan Anda :</h3>
                                </div>
                                {{-- <br> --}}
                                <div class="row">
                                    <h5 class="text-bold">Kelas: {{$post->title}}</h5>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="line">
                                                <td><strong>No.</strong></td>
                                                <td class="text-center"><strong>Jadwal</strong></td>
                                                <td class="text-right"><strong>Harga Per Sesi</strong></td>
                                                <td class="text-right"><strong>Subtotal</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($schedules as $schedule)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="text-center">{{$schedule->start_date}} - {{$schedule->end_date}}</td>
                                                <td class="text-center">{{ $post->price }}</td>
                                                <td class="text-right">{{ $post->price }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2"></td>
                                                <td class="text-right"><strong>PPN</strong></td>
                                                <td class="text-right"><strong>0</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                </td>
                                                <td class="text-right"><strong>Total</strong></td>
                                                <td class="text-right"><strong>Rp.{{ $totalPrice }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right identity">
                                        <p>Nama Tutor: <strong>{{$post->user->name}}</strong><br></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                               </div>
                           </div>
                            
            
            
            <!-- END INVOICE -->
            <div class="card-header bg-white">
                <div class="invoice-title">
                    <div class="row">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="text-primary"><strong>Pembayaran</strong><br>
                                {{-- <span class="small">Pesanan Anda</span> --}}
                            </h2>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card card-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <div class="text-primary">Mohon untuk melakukan transfer bank kepada :</div>
                                    32132179312 a.n TutorKuy(BCA)<br>
                                </address>
                            </div>
                        </div>
                </div>
            </div>
                <div class="card card-2">
                    <div class="card-body">
                        <div class="text-primary heading">Bukti Pembayaran</div>
                        <div class="text mb-2" style="font-size:22px">Harap masukkan bukti pembayaran anda :</div>
                            <form action="/orders" enctype="multipart/form-data" method="POST" id="create-post-form">
                                @csrf
                                <div class="form-group">
                                    <label for="ordername">Nama</label>
                                    <input type="text" name="ordername" class="rounded-pill form-control formInput @error('ordername') is-invalid @enderror formInput" value="{{ old('ordername') }}">
    
                                    @error('ordername')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
    
                                <div class="form-group">
                                    <label for="banknumber">Nomor Rekening Anda</label>
                                    <input type="text" name="banknumber" class="rounded-pill form-control formInput @error('banknumbe') is-invalid @enderror formInput" value="{{ old('banknumber') }}">
                                    @error('banknumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> 
    
                                <div class="form-group">
                                    <label for="bankcode">Bank Pengirim</label>
                                    <select type="text" name="bankcode" id="bankcode" class="rounded-pill form-control formInput @error('bankcode') is-invalid @enderror formInput" value="{{ old('bankcode') }}">
                                        <option value="BCA">BCA</option>
                                        <option value="BRI">BRI</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="CIMB">CIMB</option>
                                        <option value="BNI">BNI</option>
                                    </select>
                                    @error('bankcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Bukti Pembayaran</label>
                                    <input type="file" name="image" id="image" class="d-block @error('image') is-invalid @enderror">
    
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
    
                                <input type="hidden" id="postId" name="postId" value="{{$post->id}}">
                                <input type="hidden" id="scheduleId" name="scheduleId" value="{{$schedule->id}}">
    
                                {{-- <button class="btn btn-primary w-100 rounded-pill">Proses Pesanan</button> --}}
                                <button type="button" class="btn btn-primary rounded-pill float-right" data-toggle="modal" data-target="#exampleModalCenter">
                                    Proses Pesanan
                                </button>

                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Pesanan akan <i>direview</i> admin dalam 1x24 jam. Setelah pembayaran anda disetujui oleh admin, kelas dapat anda ikuti.
                                                    <div class="modal-footer">
                                                        
                                                        {{-- <input type="hidden" id="postId" name="postId" value="{{$post->id}}"> --}}
                                                        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Batal</button>
                                                        <input type="submit" value="Proses Pesanan" class="btn btn-primary w-50 rounded-pill">
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
    </div>
</div>
@endsection
