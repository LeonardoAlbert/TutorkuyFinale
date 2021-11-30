<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Order;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create(Post $post){
      // dd($post);
       
        return view('/order/create', compact('post'));
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
        $order->status = "Waiting for Verification";
        $order->bankcode = request()->bankcode;
        $order->banknumber = request()->banknumber;
        $order->post_id = request()->postId;
        $order->user_id = auth()->user()->id;
        $order->save();

       

        return redirect('/admin');
    }
}
