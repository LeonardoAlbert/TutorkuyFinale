<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\User;

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

    public function manageverif(){
        $users = DB::table('users')->get();

        return view("/admin/manageverif", compact('users'));
    }

    public function verifdetails(User $user){

    //  dd($user);

        return view('/admin/manageverifdetails', compact('user'));
    }
    
    public function verifdownload(User $user){

        //  dd($user);
            $pathToFile = public_path('storage/'.$user->fileverif);
            return response()->download($pathToFile);
        //    return view('/admin/manageverifdetails', compact('user'));
        }

}