<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Message;
use Carbon\Carbon;

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
    public function index(Room $room)
    {
        $selected = 0;
        if ($room) {
            $selected = $room->id;
        }
        $user = auth()->user();
        if ($user->role == 0) {
            // student
            $chatRooms = Room::with(['student', 'tutor'])->where('student_id', $user->id)->get();
            //dd($chatRooms);
            if($chatRooms->isEmpty()){
                return redirect("/home");
            }
            // check selected
            if ($selected != 0) {
                $selectedUser = User::where('id', $room->tutor_id)->first();
                $messages = Message::where('room_id', $room->id)->get();
                // dd($messages);
            } else {
                $selectedUser = User::where('id', $chatRooms[0]->tutor_id)->first();
                $messages = Message::where('room_id', $chatRooms[0]->id)->get();
                $selected = $chatRooms[0]->id;
            }
        } else if ($user->role == 1) {
            // teacher
            $chatRooms = Room::with(['student', 'tutor'])->where('tutor_id', $user->id)->get();
            // check selected
            if ($selected != 0) {
                $selectedUser = User::where('id', $room->student_id)->first();
                $messages = Message::where('room_id', $room->id)->get();
            } else {
                $selectedUser = User::where('id', $chatRooms[0]->student_id)->first();
                $messages = Message::where('room_id', $chatRooms[0]->id)->get();
                $selected = $chatRooms[0]->id;
            }
        } else {
            return view("home");
        }

        return view("chat/index", compact('user', 'selected', 'selectedUser', 'chatRooms', 'messages'));
    }

    public function selectedUser(User $user) {
        // get Room First
        $room = Room::where('student_id', $user->id)->first();

        if (!$room) {
            $room = new Room;
            $room->student_id = $user->id;
            $room->tutor_id = auth()->user()->id;
            $room->save();
        }
        $selected = 0;
        if ($room) {
            $selected = $room->id;
        }
        $user = auth()->user();
        if ($user->role == 0) {
            // student
            $chatRooms = Room::with(['student', 'tutor'])->where('student_id', $user->id)->get();
            //dd($chatRooms);
            if($chatRooms->isEmpty()){
                return redirect("/home");
            }
            // check selected
            if ($selected != 0) {
                $selectedUser = User::where('id', $room->tutor_id)->first();
                $messages = Message::where('room_id', $room->id)->get();
                // dd($messages);
            } else {
                $selectedUser = User::where('id', $chatRooms[0]->tutor_id)->first();
                $messages = Message::where('room_id', $chatRooms[0]->id)->get();
                $selected = $chatRooms[0]->id;
            }
        } else if ($user->role == 1) {
            // teacher
            $chatRooms = Room::with(['student', 'tutor'])->where('tutor_id', $user->id)->get();
            // check selected
            if ($selected != 0) {
                $selectedUser = User::where('id', $room->student_id)->first();
                $messages = Message::where('room_id', $room->id)->get();
            } else {
                $selectedUser = User::where('id', $chatRooms[0]->student_id)->first();
                $messages = Message::where('room_id', $chatRooms[0]->id)->get();
                $selected = $chatRooms[0]->id;
            }
        } else {
            return view("home");
        }

        return view("chat/index", compact('user', 'selected', 'selectedUser', 'chatRooms', 'messages'));
    }

    public function store(Request $request){
        $message = new Message;
        $message->room_id = $request->roomId;
        $message->sender_id = $request->senderId;
        $message->message = $request->message;
        $message->is_read = false;
        $message->created_at = Carbon::now();
        $message->save();

        $redirect = 'chat/' . $request->roomId;
        return redirect($redirect);
    }

    public function newRoom(Request $request) {
        // check if exist
        //dd($request);
        $room = Room::where('tutor_id', $request->tutorId)->where('student_id', auth()->user()->id)->first();

        //dd($room);
        if ($room) {

            $redirect = 'chat/' . $room->roomId;
        } else {
              // tutor id
            $room = new Room;
            $room->tutor_id = $request->tutorId ;
            $room->student_id= auth()->user()->id;
            // $room->created_at = Carbon::now();
            $room->save();
        }



        $redirect = 'chat/' . $room->roomId;
        return redirect($redirect);
    }
}
