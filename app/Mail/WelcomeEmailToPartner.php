<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeEmailToPartner extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $user_password;
    public function __construct($data, $user_password)
    {
        $this->data = $data;
        $this->user_password = $user_password;
    }


    public function envelope(): Envelope
    {
        $to = [
            new Address($this->data->email, $this->data->name ),
        ];
        return new Envelope(
            to:$to,
            subject: 'Welcome To Digishop as a Partner',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.welcome-email-to-partner',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
