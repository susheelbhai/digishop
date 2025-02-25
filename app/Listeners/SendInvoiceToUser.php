<?php

namespace App\Listeners;

use App\Mail\InvoiceToUser;
use App\Events\OrderCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Susheelbhai\WhatsApp\Services\Facades\WhatsApp;

class SendInvoiceToUser
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
    public function handle(OrderCreated $event): void
    {
        $customer_phone = '91'.$event->data->customer_phone;
        $invoice = asset($event->data->invoice_original_name);
        if (config('app.env') == 'local') {
            $invoice = 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf';
        }
        $data = [
            'phone' => $customer_phone,
            'message' => 'Thank you for shopping, Please download the invoice',
            'media_url' => $invoice
        ];
        WhatsApp::sendMedia($data);
        // dd($invoice);
        if ($event->data->customer_email != null || $event->data->customer_email != '') {
            Mail::send(new InvoiceToUser($event->data));
        }
    }
}
