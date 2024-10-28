<?php

namespace App\Notifications;

use App\Models\Group;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class InvoiceAdminApprove extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Group $group, public User $user, public string $token)
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
        $rejectUrl = url(route('group.rejectRequest', $this->token));
        $acceptUrl = url(route('group.acceptRequest', $this->token));

        return (new MailMessage)
            ->subject('Group Join Request')
            ->view('emails.group-request', [
                'user' => $this->user,
                'group' => $this->group,
                'acceptUrl' => $acceptUrl,
                'rejectUrl' => $rejectUrl
            ]);
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
