<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;

class AdminController extends Controller
{
    public function index(){
        $orders = DB::table('orders')->get();

        return view("/admin/index", compact('orders'));
    }
    
    public function managepayment(){
        $orders = DB::table('orders')->get();

        return view("/admin/managepayment", compact('orders'));
    }

    public function details(Order $order){
        return view('/admin/managepaymentdetails', compact('order'));
    }

}