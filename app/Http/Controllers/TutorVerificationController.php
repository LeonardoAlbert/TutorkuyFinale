<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\UploadedFile;
use RealRashid\SweetAlert\Facades\Alert;
class TutorVerificationController extends Controller
{
    public function verif(User $user){
    //   $order = Order::where('id' , $request->orderId)->first();
    //   $user = User::where('id', $auth()->user()->id)->first();
        
        return view('/tutorverification/verif' , compact('user'));
    }

    public function create(){
        $user = User::where('id', auth()->user()->id)->first();
    //    dd($user);
        return view('/tutorverification/create',compact('user'));
    }

    public function store(Request $request){
    //    dd($request);
        $data = request()->validate([
            'fileverif' => 'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();

        $file = $request->file('fileverif');

        $nama_file = time()."_".$file->getClientOriginalName();

    //    $tujuan_upload = 'public/storage/file';
	//	$file->move($tujuan_upload,$nama_file);
     //   $imagePath = request('image')->store('proofofpayment', 'public');
        $filePath= request('fileverif')->store('file', 'public');
        $user->fileverif = $filePath;
        $user->verif = 1;
    //    dd($user);
        $user->save();
        Alert::success('Pengajuan verifikasi berhasil. Mohon tunggu konfirmasi admin.');
        return redirect('/home');
    }
}
