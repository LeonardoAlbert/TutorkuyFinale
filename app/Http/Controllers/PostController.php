<?php
use Illuminate\Support\Facades\DB;
namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;

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
            'description' => 'required|max:150',
            'categories' => 'required',
            'price' => 'required|numeric',
        ]);

        $category_id = Category::where('name', $data['categories'])->get()[0]->id;
        $categoryArray = ['category_id'=>$category_id];
        
        $imagePath = request('image')->store('post', 'public');
    //  dd($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 400);
        
        $image->save();

        $postRes = Post::create(array_merge(
            $data,
            $categoryArray,
            $imageArray ?? [],
        ));

        // $postRes = auth()->user()->posts()->create(array_merge(
        //     $data,
        //     $categoryArray,
        //     $imageArray ?? [],
        // ));

        return redirect("/admin");
    }
    
}
