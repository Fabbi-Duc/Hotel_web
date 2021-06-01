<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $imgSrc;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($imgSrc)
    {
        //
        $this->imgSrc =  $imgSrc;     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail')->with([
            'imgSrc' => $this->imgSrc
        ]);
    }
}
