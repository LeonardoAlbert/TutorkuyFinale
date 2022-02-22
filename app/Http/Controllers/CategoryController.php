<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryType;
use App\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function create()
    {
        $categorytypes = CategoryType::all();
      //  dd($categorytypes);
       
        return view('category/create',compact('categorytypes'));
    }
    public function requeststore(){
        
        $data = request()->validate([
            'name' => 'required|max:30',
           
            'type' => 'required',
        ]);

        $category_type_id = CategoryType::where('name', $data['type'])->get()[0]->id;
        $category = new Category;
        $category->name = request()->name;
        $category->category_type_id = $category_type_id;
        $category->statuscategories = 0;
        
        $category->save();
       // dd($category);
        return redirect('/home');
    }
    public function store()
    {
       // dd(request());
        $data = request()->validate([
            'name' => 'required|max:30',
            'image' => 'required|image',
            'type' => 'required',
        ]);
        //dd(request());
        $imagePath = request('image')->store('category', 'public');
      //  dd($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 400);
        
        $image->save();

        $category_type_id = CategoryType::where('name', $data['type'])->get()[0]->id;
    //    dd($category_types_id);
    //    $categoryArray = ['category_types_id'=>$category_types_id];

        $category = new Category;
        $category->name = request()->name;
        $category->image = $imagePath;
        $category->category_type_id = $category_type_id;
        $category->statuscategories = 2;
        $category->save();
      // dd($category);
        return redirect("/admin");
    }
    public function index(Request $request){

        $categories = [];
        $allcategorytypes = CategoryType::all();
        $categorytypes = [];
        
        $type_id = $request->type_id;
        //dd($type_id);

        if($type_id == -1){
            $categorytypes = CategoryType::whereHas('categories', function($q) use($request)
            {
                $q->where('name', 'like', "%$request->search%");
            })->get();
        }
        else{
            $categorytypes = CategoryType::whereHas('categories', function($q) use($request)
            {
                $q->where('name', 'like', "%$request->search%");
            })->where('id', $type_id)->get();            
        }
        

        //dd($category_types);
        $search = $request->search;
        
        //dd($search);
       //$categories = DB::table('categories')->get();
       //dd($categories);

        $categories = Category::where('name', 'like', "%$request->search%")->where('statuscategories',2)->orderBy('created_at', 'desc')->get();
        
            
        // dd($categorytypes);

        //dd($categories);
        return view('/category/index', compact('categorytypes', 'categories', 'search', 'allcategorytypes', 'type_id'));
      
    }
    public function accepted(Request $request){
        $data = request()->validate([
           
            'image' => 'required|image',
          
        ]);

     //dd($request);

     $imagePath = request('image')->store('category', 'public');
      //  dd($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 400);
        
        $image->save();

      $category = Category::where('id' , $request->categoryId)->first();
      $category->statuscategories = 2;
      $category->image = $imagePath;
      $category->save();
      //dd($category);
      return redirect("/admin");
    }

    public function declined(Request $request){
        $category = Category::where('id' , $request->categoryId)->first();
        $category->statuscategories = 1;
        $category->save();
        return redirect("/admin");
    }
    
    
    public function show(Category $category, Request $request){
        $posts = [];
        $search = $request->search;
       // $posts = $category->posts();
       $posts = DB::table('posts')->join('users', 'user_id', '=', 'users.id')->where('category_id', $category->id)->where('title','like', "%$request->search%")->select('posts.id','users.id as userid','users.image as userimage', 'posts.image as postimage', 'users.name','posts.title','users.verif','users.rate','users.num_work','posts.count_participant','posts.participants',
       'posts.price')->get();
       //dd($posts);
       //dd($posts);
       //$categories = Category::where('name', 'like', "%$request->search%")->where('statuscategories',2)->orderBy('created_at', 'desc')->get();
       //dd($posts);
       // $posts = Post::where('category_id','like', '%$category->id%')->get();
        //dd($category->id);
        return view('/category/show' , compact('category','posts','search'));

    }
}
