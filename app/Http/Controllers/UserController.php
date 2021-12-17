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
class UserController extends Controller
{

    public function show(User $user){

        return view('users/show', compact('user'));
    }

    public function upcomingclass(){
        $orders = DB::table('orders')->join('posts', 'post_id', '=', 'posts.id')->join('class_schedules', 'classschedule_id', '=', 'class_schedules.id')->where('orders.orderuser_id' , auth()->user()->id)->where('orders.status' , "Menunggu Kelas Dilaksanakan")->get();
     //  dd($orders);
     //dd($orders['schedule']);
     $i  = 1;
        foreach($orders as $data) {
            
        // $schedule_class = new ClassSchedule;
        // $schedule_class->post_id = $postRes->id;
        //dd($data->schedule);
        $dt = Carbon::parse($data->schedule);
    //   dd($dt->day);
    //    dd($dt->hour);
    //    dd($dt->minute);
    //   dd($dt->englishDayOfWeek);
        $timestamp = strtotime($data->schedule);
        
        
        $month = date('M', $timestamp);
       //dd($month);
        $data->DayofWeek =$dt->englishDayOfWeek;
            $data->month = $month;
            $data->day = $dt->day;
            $data->hour = $dt->hour;
            $data->minute =  $dt->minute;
        }

     //   dd($orders);

        return view('users/upcomingclass', compact('orders'));
    }
    public function home(){
        $user = User::inRandomOrder()->where('users.role' , "1")->limit(4)->get();
        $category =Category::inRandomOrder()->limit(4)->get();
        $post = Post::inRandomOrder()->limit(4)->get();
    //    dd($post);
        return view('users/home', compact('user','category','post'));
    }
    public function review(User $user){

        return view('users/review', compact('user'));
    }

    public function reviewsubmit(Request $request){
     //   dd(request());

        $user = User::where('id' , $request->userId)->first();
        $user->num_work = $user->num_work + 1;
        $user->rate = ($user->rate + $request->rating)/$user->num_work;
        $user->save();

        return redirect("/users/$user->id");
    }

    public function edit(User $user){
        return view('users/edit', compact('user'));
    }
   
    public function update(User $user){
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

        if(request('image')){
           
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

        return redirect("/admin");
    }
    public function verifaccepted(Request $request){
    //    dd($request);
          $user = User::where('id' , $request->userId)->first();
          $user->verif = 2;
          $user->save();
    
          return redirect('/admin');
        }

        public function verifdeclined(Request $request){
            // dd($request);
              $user = User::where('id' , $request->userId)->first();
              $user->verif = 0;
              $user->save();
        
              return redirect('/admin');
        }
   
}
