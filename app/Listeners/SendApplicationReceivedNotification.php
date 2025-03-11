<?php

namespace App\Listeners;

use App\Events\ApplicationReceived;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationReceivedToUser;
use App\Mail\ApplicationReceivedToAdmin;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ApplicationReceivedToPartner;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApplicationReceivedNotification implements ShouldQueue
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
    public function handle(ApplicationReceived $event): void
    {
        
        if ($event->data->owner_email != null || $event->data->email != null) {
            Mail::send(new ApplicationReceivedToUser($event->data));
        }
        if ($event->data->partner_id != null) {
            Mail::send(new ApplicationReceivedToPartner($event->data));
        }
        Mail::send(new ApplicationReceivedToAdmin($event->data));
    }
}
