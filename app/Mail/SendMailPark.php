<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailPark extends Mailable
{
    use Queueable, SerializesModels;
    protected $park_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($park_id)
    {
         $this->park_id =  $park_id;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail_park')->with([
            'park_id' => $this->park_id
        ]);;
    }
}
