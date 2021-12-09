<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorOrderAcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    //  dd($this->data);
    //   dd($this->data);
        return $this->subject('Mail from TutorKuy')
        ->view('emails.tutorOrderAccepted')
        ->with(
         [
            'data' => $this->data,
            
        ]);
    }
}
