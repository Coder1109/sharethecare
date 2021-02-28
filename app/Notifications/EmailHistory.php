<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EmailHistory extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $sms_histories;

    public function __construct($sms_histories)
    {
        $this->sms_histories = $sms_histories;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
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
        $sms_histories = $this->sms_histories;

        $notes = $sms_histories->description;
        $patientEmail = $sms_histories->email;

        $jsonData = json_encode($patientEmail);

        $qrcode = QrCode::format('png')
            ->size(500)->errorCorrection('H')
            ->generate($jsonData);

        return (new MailMessage())
            ->subject('Share the Care QR')
            ->greeting($notes)
            ->line($notes)
            ->view('notifications.smsHistory', [
                'notes' => $notes,
                'qrcode' => $qrcode
            ]);
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
}
