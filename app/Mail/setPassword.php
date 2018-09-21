<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class setPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $data_user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data_user)
    {
        $this->data_user=$data_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->view('emails.setpassword')->with('data',$this->data_user)
                ->from($this->data_user->email,$this->data_user->name)
                ->subject('Password cambiata con successo');
    }
}
