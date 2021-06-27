<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailPark extends Mailable
{
    use Queueable, SerializesModels;
    protected $time, $month, $year, $money;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($time, $month, $year, $money)
    {
        $this->time =  $time;
        $this->year = $year;
        $this->month = $month;
        $this->money = $money;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail_park')->with([
            'year' => $this->year,
            'time' => $this->time,
            'month' => $this->month,
            'money' => $this->money,
        ]);
    }
}
