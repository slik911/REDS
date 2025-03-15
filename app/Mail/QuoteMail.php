<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $mailData;
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailData['title'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.quote',
            with: $this->mailData
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        foreach ($this->mailData['attachments'] as $attachment) {
            if (isset($attachment['content'])) {
                // Attach PDF from memory
                $attachments[] = Attachment::fromData(fn () => $attachment['content'], $attachment['name'])
                    ->withMime($attachment['mime']);
            } elseif (isset($attachment['path']) && file_exists($attachment['path'])) {
                // Attach file from path
                $attachments[] = Attachment::fromPath($attachment['path'])
                    ->as(basename($attachment['path']))
                    ->withMime(mime_content_type($attachment['path']));
            }
        }

        return $attachments;
    }
}
