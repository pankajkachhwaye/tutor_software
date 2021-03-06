<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCourseAssigned extends Mailable
{
    use Queueable, SerializesModels;
    public $session_id;
    public $course;
    public $request_hash;
    public $user;
    public $contact_person;
    public $semester;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($session_id,$course,$request_hash,$user,$contact_person,$semester)
    {
        $this->session_id = $session_id;
        $this->course = $course;
        $this->request_hash= $request_hash;
        $this->user = $user;
        $this->contact_person = $contact_person;
        $this->semester = $semester;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.courseassign')->subject('EcademicTube Course-activity '.$this->contact_person->user_name);
    }
}
