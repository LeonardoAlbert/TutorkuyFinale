<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index(){
        $orders = DB::table('orders')->get();

        return view("/admin/index", compact('orders'));
    }

}