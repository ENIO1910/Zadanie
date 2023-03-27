<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CarAssignedNotification extends Notification
{
    use Queueable;

    public $car;
    public $user;

    public function __construct($car, $user)
    {
        $this->car = $car;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line($this->user->name . ' have been assigned to a car.')
            ->action('View Car', url('/cars/'))
            ->line("Car info:")
            ->line("Brand: " . $this->car->brand)
            ->line("Model: " . $this->car->brand)
            ->line("Year: " . $this->car->brand);
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
            'car_id' => $this->car->id,
            'car_brand' => $this->car->brand,
            'car_model' => $this->car->model,
            'car_year' => $this->car->year,
        ];
    }
}
