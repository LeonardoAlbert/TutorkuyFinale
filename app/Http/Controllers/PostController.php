<?php

use Illuminate\Support\Facades\DB;

namespace App\Http\Controllers;

use App\Category;
use App\ClassSchedule;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;

use Carbon\Carbon;

class PostController extends Controller
{
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('/posts/create', compact('categories'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|max:50',
            'image' => 'required|image',
            'description' => 'required|max:600',
            'categories' => 'required',
            'price' => 'required|numeric',
            'class_duration' => 'required|numeric',
            'participants' => 'required|numeric',
            'occurrence' => 'required|numeric',
            'schedule' => 'required',
        ]);
        $category_id = Category::where('name', $data['categories'])->get()[0]->id;
        $categoryArray = ['category_id' => $category_id];
        $imagePath = request('image')->store('post', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 400);
        $image->save();

        $imageArray = ['image' => $imagePath];

        $postRes = auth()->user()->posts()->create(array_merge(
            $data,
            $categoryArray,
            $imageArray ?? [],
        ));

        // add schedule
        $counter = 0;
        while ($counter < request('occurrence')) {
            $schedule_class = new ClassSchedule;
            $schedule_class->post_id = $postRes->id;
            $time = str_replace('T', ' ', request('schedule')[0]);
            $start_date = Carbon::createFromFormat('Y-m-d H:i', $time)->addWeek($counter);
            $end_date = Carbon::createFromFormat('Y-m-d H:i', $time)->addWeek($counter)->addHours(request('class_duration'));
            $schedule_class->start_date = $start_date;
            $schedule_class->end_date = $end_date;
            $schedule_class->save();
            $counter++;
        }

        return redirect("/home");
    }

    public function details(Post $post)
    {
       
        $sched = [];

        // $pastClass = [];
        // $orders = DB::table('orders')
        //     ->join('posts', 'post_id', '=', 'posts.id')
        //     ->where('orders.orderuser_id', auth()->user()->id)
        //     ->where(function ($query) {
        //         $query->where('orders.status', '=', 'Menunggu Kelas Dilaksanakan')
        //               ->orWhere('orders.status', '=', 'Selesai');
        //     })
        //     ->get();

        // foreach ($orders as $order) {

        //     // get schedule for each order
        //     $schedules = ClassSchedule::where('post_id', $order->post_id)
        //         ->where('status', 'Selesai')
        //         ->get();

        //     foreach ($schedules as $schedule) {
        //         $datum = new \stdClass;

        //         $dt = Carbon::parse($schedule->start_date);
        //         $timestamp = strtotime($schedule->start_date);
        //         $month = date('M', $timestamp);

        //         $datum->DayofWeek = $dt->englishDayOfWeek;
        //         $datum->month = $month;
        //         $datum->day = $dt->day;
        //         $datum->hour = $dt->hour;
        //         if ($dt->minute < 10) {
        //             $datum->minute = '0' . $dt->minute;
        //         } else {
        //             $datum->minute =  $dt->minute;
        //         }
        //         $datum->end_hour = $dt->hour + $order->class_duration;

        //         $datum->id = $order->id;
        //         $datum->title = $order->title;
        //         $datum->linkmeeting = $order->linkmeeting;
        //         array_push($pastClass, $datum);

            // }
            $sched = [];
        
        $css = DB::table('class_schedules')->where('post_id', $post->id)->get();
        foreach($css as $schedule){
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
            //dd($css);
            //dd($post);
       // dd($sched);
        $user = User::where('id', $post->user_id)->first();
        return view("/posts/details", compact('post', 'css', 'user','sched'));
    }

    public function edit(Post $post)
    {
        $categories = DB::table('categories')->get();
        // $post = DB::table('posts')->where('id', $id)->get();

        return view("/posts/edit", compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        //dd(request());
        $data = request()->validate([
            'title' => 'required|max:50',
            'image' => 'required|image',
            'description' => 'required|max:150',
            'categories' => 'required',
            'price' => 'required|numeric',
        ]);

        $post->update([
            'title' => request()->title,
            'image' => request()->image,
            'description' => request()->description,
            'categories' => request()->categories,
            'price' => request()->price,
        ]);

        return redirect("/admin");
    }

    public function destroy(Post $post)
    {
        $user = $post->user->id;

        $post->delete();

        return redirect("/users/$user");
    }

    public function createlinkmeeting(Post $post)
    {

        return view('/posts/linkmeeting', compact('post'));
    }

    public function linkmeeting(Request $request)
    {
        $data = request()->validate([
            'linkmeeting' => 'required|url',
        ]);

        $post = Post::where('id', $request->postId)->first();
        $post->link_meeting = $data['linkmeeting'];
        $post->save();
        return redirect('/orders/' . $post->id . '/tutor/details');
    }

    public function uploadmaterial(Request $request)
    {
        //dd(request());
        $data = request()->validate([
            'material' => 'required',
        ]);


        $post = Post::where('id', $request->postId)->first();
        $post->material = $data['material'];
        $filePath = request('material')->store('materialfile', 'public');
        $post->material = $filePath;
        $post->save();
        return redirect('/orders/' . $post->id . '/tutor/details');
    }


    public function materialdownload(Post $post)
    {
        $pathToFile = public_path('storage/' . $post->material);
        return response()->download($pathToFile);
        //    return view('/admin/manageverifdetails', compact('user'));
    }
}
