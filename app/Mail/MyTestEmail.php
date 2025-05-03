<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyTestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = is_array($this->data) ? $this->data['subject'] ?? 'Test Email' : 'Test Email';
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'teachers.mail', // Updated to match previous setup
            with: ['data' => $this->data],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if (is_array($this->data) && isset($this->data['attachment'])) {
            return [
                \Illuminate\Mail\Mailables\Attachment::fromPath($this->data['attachment']->getRealPath())
                    ->as($this->data['attachment']->getClientOriginalName())
                    ->withMime($this->data['attachment']->getMimeType()),
            ];
        }
        return [];
    }
}
