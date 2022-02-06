<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Post;
use App\Category;
use App\CategoryType;
use App\ClassSchedule;

class UserController extends Controller
{

    public function requestcategory()
    {
        $categorytypes = CategoryType::all();
        //  dd($categorytypes);


        return view('users/requestcategory', compact('categorytypes'));
    }

    public function show(User $user)
    {

        return view('users/show', compact('user'));
    }

    public function upcomingClass()
    {
        $upCommingClass = [];
        $orders = DB::table('orders')
            ->join('posts', 'post_id', '=', 'posts.id')
            ->where('orders.orderuser_id', auth()->user()->id)
            ->where('orders.status', "Menunggu Kelas Dilaksanakan")
            ->get();

        foreach ($orders as $order) {

            // get schedule for each order
            $schedules = ClassSchedule::where('post_id', $order->post_id)
                ->where('status', 'Menunggu')
                ->get();

            foreach ($schedules as $schedule) {
                $datum = new \stdClass;

                $dt = Carbon::parse($schedule->start_date);
                $timestamp = strtotime($schedule->start_date);
                $month = date('M', $timestamp);

                $datum->DayofWeek = $dt->englishDayOfWeek;
                $datum->month = $month;
                $datum->day = $dt->day;
                $datum->hour = $dt->hour;
                if ($dt->minute < 10) {
                    $datum->minute = '0' . $dt->minute;
                } else {
                    $datum->minute =  $dt->minute;
                }
                $datum->end_hour = $dt->hour + $order->class_duration;

                $datum->id = $order->id;
                $datum->title = $order->title;
                $datum->linkmeeting = $order->linkmeeting;
                array_push($upCommingClass, $datum);
            }
        }

        return view('users/upcomingclass', compact('upCommingClass'));
    }

    public function pastClass()
    {
        $pastClass = [];
        $orders = DB::table('orders')
            ->join('posts', 'post_id', '=', 'posts.id')
            ->where('orders.orderuser_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('orders.status', '=', 'Menunggu Kelas Dilaksanakan')
                      ->orWhere('orders.status', '=', 'Selesai');
            })
            ->get();

        foreach ($orders as $order) {

            // get schedule for each order
            $schedules = ClassSchedule::where('post_id', $order->post_id)
                ->where('status', 'Selesai')
                ->get();

            foreach ($schedules as $schedule) {
                $datum = new \stdClass;

                $dt = Carbon::parse($schedule->start_date);
                $timestamp = strtotime($schedule->start_date);
                $month = date('M', $timestamp);

                $datum->DayofWeek = $dt->englishDayOfWeek;
                $datum->month = $month;
                $datum->day = $dt->day;
                $datum->hour = $dt->hour;
                if ($dt->minute < 10) {
                    $datum->minute = '0' . $dt->minute;
                } else {
                    $datum->minute =  $dt->minute;
                }
                $datum->end_hour = $dt->hour + $order->class_duration;

                $datum->id = $order->id;
                $datum->title = $order->title;
                $datum->linkmeeting = $order->linkmeeting;
                array_push($pastClass, $datum);
            }
        }

        return view('users/pastclass', compact('pastClass'));
    }

    public function tutorClass()
    {
        $user = auth()->user();
        $class = Post::where('user_id', $user->id)->get();
        return view('users/tutorclass', compact('class'));
    }

    public function upcomingClassTutor()
    {
        $upCommingClass = [];
        $posts = Post::where('user_id', auth()->user()->id)
        ->where('status', 'Memulai')->get();

        foreach ($posts as $post) {

            // get schedule for each order
            $schedules = ClassSchedule::where('post_id', $post->id)
                ->where('status', 'Menunggu')
                ->get();

            foreach ($schedules as $schedule) {
                $datum = new \stdClass;

                $dt = Carbon::parse($schedule->start_date);
                $timestamp = strtotime($schedule->start_date);
                $month = date('M', $timestamp);

                $datum->DayofWeek = $dt->englishDayOfWeek;
                $datum->month = $month;
                $datum->day = $dt->day;
                $datum->hour = $dt->hour;
                if ($dt->minute < 10) {
                    $datum->minute = '0' . $dt->minute;
                } else {
                    $datum->minute =  $dt->minute;
                }
                $datum->end_hour = $dt->hour + $post->class_duration;

                $datum->id = $post->id;
                $datum->title = $post->title;
                $datum->linkmeeting = $post->linkmeeting;
                array_push($upCommingClass, $datum);
            }
        }

        return view('users/tutorupcomingclass', compact('upCommingClass'));
    }

    public function home()
    {
        $users = User::inRandomOrder()->where('users.role', "1")->limit(4)->get();
        $categories = Category::inRandomOrder()->limit(4)->get();
        $posts = Post::inRandomOrder()->where('posts.status' , "Menunggu Peserta")->orWhere('posts.status' , "Memulai")->limit(4)->get();
        //    dd($post);
        return view('users/home', compact('users', 'categories', 'posts'));
    }

    public function review(User $user)
    {

        return view('users/review', compact('user'));
    }

    public function reviewsubmit(Request $request)
    {
        //   dd(request());

        $user = User::where('id', $request->userId)->first();
        $user->num_work = $user->num_work + 1;
        $user->rate = ($user->rate + $request->rating) / $user->num_work;
        $user->save();

        return redirect("/users/$user->id");
    }

    public function edit(User $user)
    {
        return view('users/edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'image' => 'image',
            'headline' => 'max:150',
            'bio' => 'max: 350',
            'city' => '',
            'country' => ''
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);

        if (request('image')) {

            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1920, 1080);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        $user->update(array_merge(
            $data,
            $imageArray ?? [],
            $headerArray ?? []
        ));

        $user->save();

        return redirect("/home");
    }
    public function verifaccepted(Request $request)
    {
        //    dd($request);
        $user = User::where('id', $request->userId)->first();
        $user->verif = 2;
        $user->save();

        return redirect('/admin/manageverif');
    }

    public function verifdeclined(Request $request)
    {
        // dd($request);
        $user = User::where('id', $request->userId)->first();
        $user->verif = 0;
        $user->save();

        return redirect('/admin/manageverif');
    }
}
