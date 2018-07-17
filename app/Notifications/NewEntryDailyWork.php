<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewEntryDailyWork extends Notification implements ShouldQueue
{
    use Queueable;
    protected $session_id;
    protected $dailywork;
    protected $request_hash;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($session_id,$dailywork,$request_hash)
    {
        $this->session_id = $session_id;
        $this->dailywork = $dailywork;
        $this->request_hash = $request_hash;
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
            'title' => 'New Daily Work Entry',
            'body' => 'New daily work is aasigned to you',
            'semester_id' => $this->session_id,
            'daily_work' => $this->dailywork,
            'type' => 'new-entry-daily-work',
            'url' =>'daily-work-entry/show'.'#'.$this->request_hash
        ];
    }
}
