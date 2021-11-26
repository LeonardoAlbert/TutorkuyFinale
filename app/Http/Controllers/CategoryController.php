<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryType;
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

    public function store()
    {
        //dd(request());
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
        $category->save();

        return redirect("/admin");
    }
    public function index(){
        $categorytypes = CategoryType::all();
        //dd($category_types);
       $categories = DB::table('categories')->get();
       //dd($categories);
        return view('/category/index', compact('categorytypes' , 'categories'));
    }
    public function show(){

    }
}
