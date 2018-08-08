<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CourseUpdated extends Notification
{
    use Queueable;
    protected $session_id;
    protected $course;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($session_id,$course)
    {
        $this->session_id = $session_id;
        $this->course = $course;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'Course Updated',
            'body' => 'Course is aasigned to you has been updated',
            'semester_id' => $this->session_id,
            'daily_work' => $this->course,
            'type' => 'new-course',
            'url' =>'tutor-dashboard'
        ];
    }
}
