<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category/create');
    }

    public function store()
    {
    
        $data = request()->validate([
            'name' => 'required|max:30',
            'image' => 'required|image'
        ]);
        //dd(request());
        $imagePath = request('image')->store('post', 'public');
    //    dd($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 400);
        
        $image->save();

        $category = new Category;
        $category->name = request()->name;
        $category->image = $imagePath;
        $category->save();

        return redirect("/admin");
    }

    public function show(){

    }
}
