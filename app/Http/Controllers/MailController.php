<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TutorKuyMail;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    public function index(){

	$details = [
    'title' => 'Mail from websitepercobaan.com',
    'body' => 'This is for testing email using smtp'
    ];
    
    \Mail::to('albertleonardo57@gmail.com')->send(new \App\Mail\TutorKuyMail($details));
    
    //dd("Email sudah terkirim.");

	}


    public function sendConfirmation(){



    }
}