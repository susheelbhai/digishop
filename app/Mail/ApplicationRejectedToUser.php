<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ApplicationRejectedToUser extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        $to = [
            new Address($this->data->email, $this->data->owner_name ),
        ];
        return new Envelope(
            to: $to,
            subject: 'Your onboard application is rejected',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.application-rejected-to-user',
        );
    }

    
    public function attachments(): array
    {
        return [];
    }
}
