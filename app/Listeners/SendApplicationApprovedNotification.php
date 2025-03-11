<?php

namespace App\Listeners;

use App\Events\ApplicationApproved;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationApprovedToUser;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ApplicationApprovedToPartner;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApplicationApprovedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ApplicationApproved $event): void
    {
        if ($event->data->owner_email != null || $event->data->email != null) {
            Mail::send(new ApplicationApprovedToUser($event->data, $event->user_password));
        }
        if ($event->data->partner_id != null) {
            Mail::send(new ApplicationApprovedToPartner($event->data));
        }
    }
}
