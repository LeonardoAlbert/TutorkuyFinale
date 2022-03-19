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
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class OrderController extends Controller
{
    public function create(Post $post, ClassSchedule $schedule)
    {
        // dd($post);
        //    dd( $schedule);
        $sched = [];
        
       
        foreach($schedules as $schedule){
            $datum = new \stdClass;

                $dt = Carbon::parse($schedule->start_date);
                $timestamp = strtotime($schedule->start_date);
                $month = date('M', $timestamp);

                $datum->DayofWeek = $dt->englishDayOfWeek;
                $datum->year = $dt->year;
                $datum->month = $month;
                $datum->day = $dt->day;
                $datum->hour = $dt->hour;
                if ($dt->minute < 10) {
                    $datum->minute = '0' . $dt->minute;
                } else {
                    $datum->minute =  $dt->minute;
                }
                $datum->end_hour = $dt->hour + $post->class_duration;
                array_push($sched, $datum);
            }
            dd($sched);
        $user = User::where('id', auth()->user()->id)->first();
        // dd($user);
        //dd($user);
        // 
        
        return view('/orders/create', compact('user', 'post', 'schedule'));
        // Alert::success('Pesanan anda sukses dibuat');
    }

    public function createNew(Post $post)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $schedules = ClassSchedule::where('post_id', $post->id)->get();
        $sched = [];
        foreach($schedules as $schedule){
            $datum = new \stdClass;

                $dt = Carbon::parse($schedule->start_date);
                $timestamp = strtotime($schedule->start_date);
                $month = date('M', $timestamp);

                $datum->DayofWeek = $dt->englishDayOfWeek;
                $datum->year = $dt->year;
                $datum->month = $month;
                $datum->day = $dt->day;
                $datum->hour = $dt->hour;
                if ($dt->minute < 10) {
                    $datum->minute = '0' . $dt->minute;
                } else {
                    $datum->minute =  $dt->minute;
                }
                $datum->end_hour = $dt->hour + $post->class_duration;
                array_push($sched, $datum);
            }
           // dd($sched);

        $totalPrice = $post->occurrence * $post->price;
        // Alert::success('Success Title', 'Success Message');
        
        return view('/orders/create', compact('user', 'post', 'schedules', 'totalPrice','sched'));
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
        Alert::success('Pesanan anda sukses dibuat');
        return redirect('/orders/history');
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
        //dd($orders);
        

        $schedules = ClassSchedule::where('post_id', $orders->post->id)->get();
        $sched = [];
        foreach($schedules as $schedule){
            $datum = new \stdClass;

                $dt = Carbon::parse($schedule->start_date);
                $timestamp = strtotime($schedule->start_date);
                $month = date('M', $timestamp);

                $datum->DayofWeek = $dt->englishDayOfWeek;
                $datum->year = $dt->year;
                $datum->month = $month;
                $datum->day = $dt->day;
                $datum->hour = $dt->hour;
                if ($dt->minute < 10) {
                    $datum->minute = '0' . $dt->minute;
                } else {
                    $datum->minute =  $dt->minute;
                }
                $datum->end_hour = $dt->hour + $orders->post->class_duration;
                array_push($sched, $datum);
            }
           // dd($sched);
        return view('/orders/details', compact('orders', 'sched'));
    }

    public function tutorDetails(Post $post)
    {

        $orders = Order::with('user')->where('post_id', $post->id)->get();
        $schedules = ClassSchedule::where('post_id', $post->id)->get();
       
       
       
$sched = [];
        foreach($schedules as $schedule){
            $datum = new \stdClass;

                $dt = Carbon::parse($schedule->start_date);
                $timestamp = strtotime($schedule->start_date);
                $month = date('M', $timestamp);

                $datum->DayofWeek = $dt->englishDayOfWeek;
                $datum->year = $dt->year;
                $datum->month = $month;
                $datum->day = $dt->day;
                $datum->hour = $dt->hour;
                if ($dt->minute < 10) {
                    $datum->minute = '0' . $dt->minute;
                } else {
                    $datum->minute =  $dt->minute;
                }
                $datum->end_hour = $dt->hour + $post->class_duration;
                array_push($sched, $datum);
                
            }
           
        return view('/orders/tutor_details', compact('post', 'orders', 'schedules', 'sched'));
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
        // alert('Title','Lorem Lorem Lorem', 'success');
        return redirect('/users/' . $post->user_id . '/review');
        
    }

    public function history()
    {
        $orders = DB::table('orders')->join('posts', 'post_id', '=', 'posts.id')->where('orders.orderuser_id', auth()->user()->id)->get();
        // dd($orders);
        return view('/orders/history', compact('orders'));
    }
}
