<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewComment extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $comment;
    public function __construct($user, $comment)
    {
        $this->user = $user;
        $this->comment = $comment;

    }


    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }


    public function toDatabase($notifiable)
    {

        //dd($notifiable);
        return [
            'fromUser' => $this->user,
            'comment' => $this->comment,

        ];
    }

    public function toBroadcast($notifiable)
    {

       return new BroadcastMessage([
            'fromUser' => $this->user,
            'comment' => $this->comment,

        ]) ;
    }

}
