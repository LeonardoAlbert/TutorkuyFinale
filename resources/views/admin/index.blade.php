@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="position-sticky"><h3 class="font-weight-bold text-primary">Admin Dashboard</h3></div>

    <div class="row">
        <div class="col-6">
            <div class="card shadow-dark p-4">
                <div class="row">
                    <div class="col-11">
                        <h6 class="text-primary">Manage Category Request</h6>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-right: 0; margin-left: auto;">
                        <a href="/admin/managecategory" class="btn btn-primary" style="width:100px height:30px">Check</a>
                    </div>
                </div>                 
            </div>
        </div>
    

        <div class="col-6">
            <div class="card shadow-dark p-4">
                <div class="row">
                    <div class="col-11">
                        <h6 class="text-primary">Manage Proof of Payment </h6>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-right: 0; margin-left: auto;">
                        <a href="/admin/managepayment" class="btn btn-primary" style="width:100px height:30px">Check</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-6">
            <div class="card shadow-dark p-4">
                <div class="row">
                    <div class="col-11">
                        <h6 class="text-primary">Manage Tutor Verification</h6>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-right: 0; margin-left: auto;">
                        <a href="/admin/manageverif" class="btn btn-primary" style="width:100px height:30px">Check</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card shadow-dark p-4">
                <div class="row">
                    <div class="col-11">
                        <h6 class="text-primary">Manage Existing Category</h6>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-right: 0; margin-left: auto;">
                        <a href="/admin/manageexistingcategory" class="btn btn-primary" style="width:100px height:30px">Check</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card shadow-dark p-4">
                <div class="row">
                    <div class="col-11">
                        <h6 class="text-primary">Manage Tutor's Payment</h6>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-right: 0; margin-left: auto;">
                        <a href="/admin/manageverif" class="btn btn-primary" style="width:100px height:30px">Check</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</div>
@endsection