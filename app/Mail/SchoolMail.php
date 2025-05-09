<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SchoolMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $full_name, public $id, public $day , public $school)
    {
        $this->full_name = $full_name;
        $this->day = $day;
        $this->school = $school;
        $this->id = $id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'LionsGeek School Invitation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
       
        $view = $this->day ? 'maizzleMails.emails.schoolMail' : 'maizzleMails.emails.schoolMail2';

        return new Content(
            view: $view
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
