<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceToUser extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $media_url;
    public function __construct($data, $media_url)
    {
        $this->data = $data;
        $this->media_url = $media_url;
        // dd($this->data['invoice_original_name']);
    }

    public function envelope(): Envelope
    {
        $to = [
            new Address($this->data->customer_email, $this->data->customer_name ),
        ];
        return new Envelope(
            to: $to,
            subject: 'Invoice for your order with '.$this->data['business_name'],
        );
    }

    
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.invoice-to-user',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromUrl($this->media_url)
        ];
    }
}
