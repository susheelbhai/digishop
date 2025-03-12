<?php

namespace App\Listeners;

use App\Mail\InvoiceToUser;
use App\Events\OrderCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Susheelbhai\WhatsApp\Services\Facades\WhatsApp;

class SendInvoiceToUser implements ShouldQueue
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
        $invoice = route('invoice.generate', [$event->data['id'], 'original']);
        if (config('app.env') == 'local') {
            $invoice = 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf';
        }
        // dd($invoice);
        $data = [
            'phone' => $customer_phone,
            'message' => 'Thank you for shopping, You can download the invoice using the following url '.route('invoice.show', ['id' => $event->data['id'], 'invoice_key' =>$event->data['invoice_key'] ]),
            // 'media_url' => $invoice
        ];
        WhatsApp::sendText($data);
        // dd($invoice);
        if ($event->data->customer_email != null || $event->data->customer_email != '') {
            Mail::send(new InvoiceToUser($event->data, $invoice));
        }
    }
}
