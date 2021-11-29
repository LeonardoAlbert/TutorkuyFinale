<?php
use Illuminate\Support\Facades\DB;
namespace App\Http\Controllers;
use App\Category;
use App\ClassSchedule;

use App\Post;
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
        // dd(request());
        $data = request()->validate([
            'title' => 'required|max:50',
            'image' => 'required|image',
            'description' => 'required|max:150',
            'categories' => 'required',
            'price' => 'required|numeric',
        ]);

        // Carbon::createFromFormat('d-m-Y H:i:s', $date1);
        $schedule = [request('schedule')];

        $category_id = Category::where('name', $data['categories'])->get()[0]->id;
        $categoryArray = ['category_id'=>$category_id];
        

        $imagePath = request('image')->store('post', 'public');
    //  dd($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 400);
        
        $image->save();
        $imageArray = ['image' => $imagePath];

        $postRes = Post::create(array_merge(
            $data,
            $categoryArray,
            $imageArray ?? [],
        ));

        foreach($schedule as $data) {
            $schedule_class = new ClassSchedule;
            $schedule_class->post_id = $postRes->id;
            // dd($data);
            $time = str_replace('T', ' ', $data);
            // dd($time);
            // dd(Carbon::createFromFormat('Y-m-d H:i', $time));
            $schedule_class->schedule = Carbon::createFromFormat('Y-m-d H:i', $time);
            $schedule_class->save();
        }

        // $postRes = auth()->user()->posts()->create(array_merge(
        //     $data,
        //     $categoryArray,
        //     $imageArray ?? [],
        // ));

        return redirect("/admin");
    }
    
}
