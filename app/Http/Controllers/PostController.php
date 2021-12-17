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
    public function create(){
        $categories = DB::table('categories')->get();
       
        return view('/posts/create', compact('categories'));
    }

    public function store(){
       //  dd(request());
        $data = request()->validate([
            'title' => 'required|max:50',
            'image' => 'required|image',
            'description' => 'required|max:600',
            'categories' => 'required',
            'price' => 'required|numeric',
        ]);

        // Carbon::createFromFormat('d-m-Y H:i:s', $date1);
        $schedule = [request('schedule')];
        //dd($schedule);
        $category_id = Category::where('name', $data['categories'])->get()[0]->id;
        $categoryArray = ['category_id'=>$category_id];
        

        $imagePath = request('image')->store('post', 'public');
    //  dd($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 400);
        
        $image->save();
        $imageArray = ['image' => $imagePath];

        // $postRes = Post::create(array_merge(
        //     $data,
        //     $categoryArray,
        //     $imageArray ?? [], 
        // ));

         $postRes = auth()->user()->posts()->create(array_merge(
            $data,
            $categoryArray,
            $imageArray ?? [],
        ));
//dd(request('schedule'));
        foreach(request('schedule') as $data) {
           // dd($data);
           if($data == null){
               continue;
           }
            $schedule_class = new ClassSchedule;
            $schedule_class->post_id = $postRes->id;
            // dd($data);
            
            $time = str_replace('T', ' ', $data);
            
            // dd($time);
            //dd($time);
            // dd(Carbon::createFromFormat('Y-m-d H:i', $time));
            $schedule_class->schedule = Carbon::createFromFormat('Y-m-d H:i', $time);
            $schedule_class->schedule = $time;
        //   dd($schedule_class);
            $schedule_class->save();
        }

       

        return redirect("/home");
    }

    public function details(Post $post){
     //   dd($post);
        $css = DB::table('class_schedules')->get();
        
    $user = User::where('id' , $post->user_id)->first();
    //   dd($user);
      //  dd($classSchedule);
        return view("/posts/details", compact('post','css','user'));
    }

    public function edit(Post $post){
        $categories = DB::table('categories')->get();
        // $post = DB::table('posts')->where('id', $id)->get();       

        return view("/posts/edit", compact('post', 'categories'));
    }

    public function update(Post $post){
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

    public function destroy(Post $post){
        $user = $post->user->id;

        $post->delete();

        return redirect("/users/$user");
    }
    
}
