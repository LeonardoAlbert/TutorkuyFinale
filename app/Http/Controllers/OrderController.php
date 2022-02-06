<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Order;
use App\User;
use App\ClassSchedule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Mail\TutorKuyMail;
use App\Mail\StudentOrderAcceptedMail;
use App\Mail\TutorOrderAcceptedMail;

class OrderController extends Controller
{
    public function create(Post $post, ClassSchedule $schedule)
    {
        // dd($post);
        //    dd( $schedule);
        $user = User::where('id', auth()->user()->id)->first();
        //dd($user);
        return view('/orders/create', compact('user', 'post', 'schedule'));
    }

    public function createNew(Post $post)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $schedules = ClassSchedule::where('post_id', $post->id)->get();
        $totalPrice = $post->occurrence * $post->price;
        return view('/orders/create', compact('user', 'post', 'schedules', 'totalPrice'));
    }

    public function store()
    {
        // dd(request());
        $data = request()->validate([
            'banknumber' => 'required|max:50',
            'bankcode' => 'required',
            'ordername' => 'required|max:150',
            'image' => 'required|image',
        ]);
        $post = Post::where('id', request()->postId)->first();
        $totalPrice = $post->occurrence * $post->price;

        $imagePath = request('image')->store('proofofpayment', 'public');
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
        $order->orderuser_id = auth()->user()->id;
        $order->total = $totalPrice;
        // $order->classschedule_id = request()->scheduleId;
        $order->save();

        $user = User::where('id', $order->orderuser_id)->first();

        $orders = DB::table('orders')->join('posts', 'post_id', '=', 'posts.id')->where('orders.id', $order->id)->first();
        //\Mail::to('albertleonardo57@gmail.com')->send(new \App\Mail\TutorKuyMail($orders));
        //\Mail::to('$user->email')->send(new \App\Mail\TutorKuyMail($orders));

        return redirect('/home');
    }
    public function accepted(Request $request)
    {
        $order = Order::where('id', $request->orderId)->first();
        $order->status = "Menunggu Kelas Dilaksanakan";
        $order->save();

        $post = Post::where('id', $order->post_id)->first();
        $post->count_participant = $post->count_participant + 1;
        $post->status = 'Memulai';
        $post->save();

        // $Studentorders = DB::table('orders')->join('posts', 'post_id', '=', 'posts.id')->join('users', 'orderuser_id', '=', 'users.id')->where('orders.id', $request->orderId)->first();
        // $Tutororders =  DB::table('orders')->join('posts', 'post_id', '=', 'posts.id')->join('users', 'user_id', '=', 'users.id')->where('orders.id', $request->orderId)->first();

        //\Mail::to('albertleonardo57@gmail.com')->send(new \App\Mail\StudentOrderAcceptedMail($Studentorders));
        //\Mail::to('$Studentorders->email')->send(new \App\Mail\StudentOrderAcceptedMail($Studentorders));
        //\Mail::to('albertleonardo57@gmail.com')->send(new \App\Mail\TutorOrderAcceptedMail($Tutororders));
        //\Mail::to('$Tutororders->email')->send(new \App\Mail\StudentOrderAcceptedMail($Studentorders));
        return redirect('/admin');
    }

    public function declined(Request $request)
    {
        //dd($request);
        $order = Order::where('id', $request->orderId)->first();
        $order->status = "Ditolak";
        $order->save();

        return redirect('/admin');
    }

    public function details(Order $order)
    {
        $orders = Order::with('post')->where('id', $order->id)->first();

        $schedules = ClassSchedule::where('post_id', $orders->post->id)->get();
        return view('/orders/details', compact('orders', 'schedules'));
    }

    public function uploadmaterial(Request $request)
    {
        //dd(request());
        $data = request()->validate([

            'material' => 'required',

        ]);


        $order = Order::where('id', $request->orderId)->first();
        $order->material = $data['material'];


        $filePath = request('material')->store('materialfile', 'public');
        $order->material = $filePath;


        //    dd($user);
        //  dd($order);
        $order->save();
        //dd($order);
        return redirect('/orders/' . $order->id . '/details');
    }


    public function materialdownload(Order $order)
    {

        //  dd($user);
        $pathToFile = public_path('storage/' . $order->material);
        return response()->download($pathToFile);
        //    return view('/admin/manageverifdetails', compact('user'));
    }

    public function ended(Request $request)
    {
        //dd($request);
        $order = Order::where('id', $request->orderId)->first();
        //dd($order);

        $post = Post::where('id', $order->post_id)->first();
        //dd($post);

        $order->status = "Selesai";
        //dd($order);
        $order->save();
        //dd($order);
        return redirect('/users/' . $post->user_id . '/review');
    }

    public function history()
    {
        $orders = DB::table('orders')->join('posts', 'post_id', '=', 'posts.id')->where('orders.orderuser_id', auth()->user()->id)->get();
        return view('/orders/history', compact('orders'));
    }

    public function createlinkmeeting(Order $order)
    {

        return view('/orders/linkmeeting', compact('order'));
    }

    public function linkmeeting(Request $request)
    {
        $data = request()->validate([

            'linkmeeting' => 'required|url',

        ]);
        //dd(request());

        $order = Order::where('id', $request->orderId)->first();
        $order->linkmeeting = $data['linkmeeting'];
        //dd($order->linkmeeting);
        // dd($order);
        $order->save();
        return redirect('/orders/' . $order->id . '/details');
    }
}
