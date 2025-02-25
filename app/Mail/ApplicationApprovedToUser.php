<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ApplicationApprovedToUser extends Mailable
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
            new Address($this->data->email, $this->data->owner_name ),
        ];
        return new Envelope(
            to: $to,
            subject: 'Your onboard application is approved',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.application-approved-to-user',
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
