<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function show(User $user){

        return view('users/show', compact('user'));
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
}
