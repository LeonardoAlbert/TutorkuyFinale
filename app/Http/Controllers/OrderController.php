<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Order;
use App\ClassSchedule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create(Post $post , ClassSchedule $css){
      // dd($post);
        
        return view('/orders/create', compact('post','css'));
    }

    public function store(){
    // dd(request());
      $data = request()->validate([

        'banknumber' => 'required|max:50',
        'bankcode' => 'required',
        'ordername' => 'required|max:150',
        'image' => 'required|image',

    ]);

      $imagePath = request('image')->store('proofofpayment', 'public');
    //  dd($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 400);
        
        $image->save();
        $imageArray = ['image' => $imagePath];

        $order = new Order;
        $order->ordername = request()->ordername;
        $order->image = $imagePath;
        $order->status = "Menunggu Pembayaran";
        $order->bankcode = request()->bankcode;
        $order->banknumber = request()->banknumber;
        $order->post_id = request()->postId;
        $order->user_id = auth()->user()->id;
        $order->save();

        return redirect('/admin');
    }
    public function accepted(Request $request){
    // dd($request);
      $order = Order::where('id' , $request->orderId)->first();
      $order->status = "Menunggu Kelas Dilaksanakan";
      $order->save();

      return redirect('/admin');
    }

    public function declined(Request $request){
      //dd($request);
       $order = Order::where('id' , $request->orderId)->first();
       $order->status = "Ditolak";
       $order->save();
 
       return redirect('/admin');
     }

    public function details(Order $order){
       
         $orders = DB::table('orders')->join('posts', 'post_id', '=', 'posts.id')->where('orders.id', $order->id)->first();
       // dd($orders);
        return view('/orders/details', compact('orders'));
    }

    public function ended(Request $request){
      //dd($request);
       $order = Order::where('id' , $request->orderId)->first();
      // dd($order);
       $order->status = "Selesai";
       //dd($order);
       $order->save();
      //dd($order);
       return redirect('/admin');
     }

    public function history(){
      $orders = DB::table('orders')->join('posts', 'post_id', '=', 'posts.id')->get();
    // dd($orders);
      // ->where('orders.user_id', auth()->user()->id )
      return view('/orders/history', compact('orders'));
    }
}
