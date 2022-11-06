<?php

namespace Modules\Core\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusNotification extends Notification
{
    use Queueable;
    
    private $details;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
    
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function via(mixed $notifiable)
    {
        return ['database', 'broadcast'];
    }
    
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->subject('Status Notification')
    //                 ->from(env('MAIL_USERNAME','test@gmail.com'),'E-shop')
    //                 ->line($this->details['title'])
    //                 ->action('View Order', $this->details['actionURL'])
    //                 ->line('Thank you!');
    // }
    
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         'title'=>$this->details['title'],
    //         'actionURL'=>$this->details['actionURL'],
    //         'fas'=>$this->details['fas']
    //     ];
    // }
    public function toArray(mixed $notifiable)
    {
        return [
            'title'     => $this->details['title'],
            'actionURL' => $this->details['actionURL'],
            'fas'       => $this->details['fas'],
        ];
    }
    
    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return BroadcastMessage
     */
    public function toBroadcast(mixed $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'title'     => $this->details['title'],
            'actionURL' => $this->details['actionURL'],
            'url'       => route('admin.notification', $this->id),
            'fas'       => $this->details['fas'],
            'time'      => date('F d, Y h:i A'),
        ]);
    }
    
}
