<?php

namespace App\Listeners;

use App\Events\ApplicationRejected;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejectedToUser;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ApplicationRejectedToPartner;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApplicationRejectedNotification implements ShouldQueue
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
    public function handle(ApplicationRejected $event): void
    {
        if ($event->data->owner_email != null || $event->data->email != null) {
            Mail::send(new ApplicationRejectedToUser($event->data));
        }
        if ($event->data->partner_id != null) {
            Mail::send(new ApplicationRejectedToPartner($event->data));
        }
    }
}
