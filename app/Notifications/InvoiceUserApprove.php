<?php

namespace App\Notifications;

use App\Models\Group;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceUserApprove extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Group $group, public User $user, public int $type)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mailMessage = new MailMessage();

            if ($this->type == 1) {
                $mailMessage->line('User ' . $this->user->name . ' has joined the group ' . $this->group->name . '.')
                            ->action('Open group', url(route('group.detail', $this->group->id)))
                            ->line('Thank you for using our application!');
            } elseif ($this->type == 2) {
                $mailMessage->line('Admin ' . $this->user->name . ' has rejected the request to join the group ' . $this->group->name . '.')
                            ->line('Thank you for using our application!');
            } elseif ($this->type == 3) {
                $mailMessage->line('Admin ' . $this->user->name . ' has accept the request to join the group ' . $this->group->name . '.')
                            ->line('Thank you for using our application!');
            }

            return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
