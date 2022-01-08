<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;

class ChatController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->roles == 0) {
            // student
            $chatRooms = Room::with(['student', 'tutor'])->where('student_id', $user->id)->get();
            // dd($chatRooms[0]->tutor);
        } else if ($user->roles == 1) {
            // teacher
        } else {
            return view("home");
        }

        return view("chat/index", compact('user', 'chatRooms'));
    }
}
