@extends('layouts.app')

@section('content')
<div class="col-9 mx-auto">
    
        <div class="p-0 mx-auto row">
            
            <div class="col-3 px-2 mb-2">
                <div class="mt-2">
                    <div class="d-flex justify-content-between">                        
                        <div class="text-left pt-3">{{ $order->ordername }}</div>
                        <br>
                        <div class="text-left pt-3">{{ $order->bankcode }}</div>
                        <br>
                        <div class="text-left pt-3">{{ $order->banknumber }}</div>
                    </div>    
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection