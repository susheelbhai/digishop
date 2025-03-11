<?php

namespace App\Listeners;

use App\Events\PartnerCreated;
use App\Mail\WelcomeEmailToPartner;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeNotificationToPartner implements ShouldQueue
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
    public function handle(PartnerCreated $event): void
    {
        Mail::send(new WelcomeEmailToPartner($event->data, $event->user_password));
    }
}
