<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\Category;
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
    public function categorydetails( $category){

        //dd($category);
        $category = Category::where('categories.id','=',$category)->join('category_types', 'category_type_id' , '=' , 'category_types.id')->select('categories.id','category_types.id as categorytypeid','category_types.name as categorytypename','categories.name as categoryname','categories.statuscategories')->first();
     // dd($category);

        return view("/admin/managecategorydetails", compact('category'));

    }
    public function managecategory(){
        $categories = Category::where('statuscategories',2)->join('category_types', 'category_type_id' , '=' , 'category_types.id')->select('categories.id','category_types.id as categorytypeid','category_types.name as categorytypename','categories.name as categoryname','categories.statuscategories')->get();
      //dd($categories);

        return view("/admin/managecategory", compact('categories'));
        
    }

    public function verifdetails(User $user){

    //  dd($user);

        return view('/admin/manageverifdetails', compact('user'));
    }
    public function paymentdownload(Order $order){
        $pathToFile = public_path('storage/'.$order->image);
            return response()->download($pathToFile);
    }
    
    public function verifdownload(User $user){

        //  dd($user);
            $pathToFile = public_path('storage/'.$user->fileverif);
            return response()->download($pathToFile);
        //    return view('/admin/manageverifdetails', compact('user'));
        }

    

    

}