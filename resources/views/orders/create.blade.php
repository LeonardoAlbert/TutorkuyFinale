@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- BEGIN INVOICE -->
        <div class="col-xs-12">
            <div class="grid invoice">
                <div class="grid-body">
                    <div class="invoice-title">
                        <div class="row">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2>invoice<br>
                                    <span class="small">order</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                Name:{{$user->name}}<br>
                                Email:{{$user->email}}<br>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                Account Number<br>
                                <strong>32132179312 a.n TutorKuy(BCA)</strong><br>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-12"> -->
                        <h3>ORDER SUMMARY</h3>
                    </div>
                    <br>
                    <div class="row">
                        <h5>Kelas: {{$post->title}}</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr class="line">
                                    <td><strong>#</strong></td>
                                    <td class="text-center"><strong>Schedule HRS</strong></td>
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
                                    <td class="text-right"><strong>Taxes</strong></td>
                                    <td class="text-right"><strong>N/A</strong></td>
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
                            <p>Tutor Identity <br><strong>{{$post->user->name}}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END INVOICE -->

            <div class="card-body">
                <div class="text-primary heading mb-3">Bukti Pembayaran</div>
                <form action="/orders" enctype="multipart/form-data" method="POST" id="create-post-form">
                    @csrf

                    <div class="form-group">
                        <label for="ordername">Nama</label>
                        <input type="text" name="ordername" class="form-control formInput @error('ordername') is-invalid @enderror formInput" value="{{ old('ordername') }}">

                        @error('ordername')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="banknumber">Nomor Account </label>
                        <input type="text" name="banknumber" class="form-control formInput @error('banknumbe') is-invalid @enderror formInput" value="{{ old('banknumber') }}">

                        @error('banknumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bankcode">Bank Pengirim </label>
                        <input type="text" name="bankcode" class="form-control formInput @error('bankcode') is-invalid @enderror formInput" value="{{ old('bankcode') }}">

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



                    <button class="btn btn-primary w-100">Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
