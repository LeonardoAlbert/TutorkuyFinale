@extends('layouts.app')

@section('content')
<div class="container-fluid my-5 d-flex justify-content-center">
    <div class="card card-1">
        <div class="card-header bg-white">
            <div class="media flex-sm-row flex-column-reverse justify-content-between ">
                <div class="col my-auto">
                    <h4 class="mb-0">Order History</h4>
                </div>
                <div class="col-auto text-center my-auto pl-0 pt-sm-4"> <img class="img-fluid my-auto align-items-center mb-0 pt-3" src="https://i.imgur.com/7q7gIzR.png" width="115" height="115">
                    
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- <div class="row justify-content-between mb-3">
                <div class="col-auto">
                    <h6 class="color-1 mb-0 change-color">Receipt</h6>
                </div>
                <div class="col-auto "> <small>Receipt Voucher : 1KAU9-84UIL</small> </div>
            </div> -->
            @foreach($orders as $order)
            <div class="row">
                <div class="col">
                    <div class="card card-2">
                        <div class="card-body">
                            <div class="media">
                                <a href="/orders/{{$order->id}}/details">
                                <div class="sq align-self-center "> <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="/storage/{{ $order->image }}" width="135" height="135" /> </div>
                                </a>
                                <div class="media-body my-auto text-right">
                                    <div class="row my-auto flex-column flex-md-row">
                                        <div class="col my-auto">
                                            <h6 class="mb-0"> {{$order->title}} </h6>
                                        </div>
                                    
                                       
                                   
                                        <div class="col my-auto">
                                            <h6 class="mb-0">Price Rp. {{$order->price}}</h6>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <hr class="my-3 ">
                            <div class="row">
                                <div class="col-md-3 "> <small>  Order Status <span><i class=" ml-2 fa fa-refresh" aria-hidden="true"></i></span></small> </div>
                                <div class="col mt-auto">
                                    
                                    <div class="media row justify-content-between ">
                                        
                                        <div class="flex-col"> <span> <small class="text-right mr-sm-2">{{$order->status}}</small><i class="fa fa-circle active"></i></span></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           
           
           
        </div>
        
        </div>
    </div>
</div>
@endsection