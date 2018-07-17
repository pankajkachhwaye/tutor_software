<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewDailyWorkAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $session_id;
    public $dailywork;
    public $request_hash;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($session_id,$dailywork,$request_hash,$user)
    {
        $this->session_id = $session_id;
        $this->dailywork = $dailywork;
        $this->request_hash= $request_hash;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.dailyworkassign')->subject('Ecademictube New Daily work assigned');
    }
}
