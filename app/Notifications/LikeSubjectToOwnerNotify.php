<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Auth;


class LikeSubjectToOwnerNotify extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    protected $obj;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($obj)
    {
        $this->obj = $obj;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
       }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
  

     public function toDatabase($notifiable)
    {
        return [
               'subject_id'       => $this->obj->subject_id,
                'member_id'    => $this->obj->member_id,
                'created_at'    => $this->obj->created_at->format('d M, Y h:i a')
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
              'subject_id'       => $this->obj->subject_id,
                'member_id'    => $this->obj->member_id,
                'created_at'    => $this->obj->created_at->format('d M, Y h:i a')
    
        ]);
    }
}
