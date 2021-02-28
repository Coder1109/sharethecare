<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class Reviews extends Notification
{
    use Queueable;

    private $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
//        return ['mail'];
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $data = $this->data;
        $emailinfo = $data['email'];
        $notes = $data['notes'];
        $jsonData = json_encode($emailinfo);

        return (new MailMessage())
            ->subject('Share the Care QR')
            ->greeting($data['notes'])
            ->line($data['notes'])
            ->view('notifications.reviews', [
                'notes' => $notes,
            ]);

//        return (new MailMessage)
//            ->subject($this->details['title'])
//
//            ->greeting($this->details['greeting'])
//
////            ->line($this->details['body'])
//
//            ->action($this->details['actionText'], $this->details['actionURL'])
//
//            ->line($this->details['thanks'].'<img src="https://rocmail1.com/images/vuexy-logo.png">');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'info' => $this->details['info']
        ];
    }
}
