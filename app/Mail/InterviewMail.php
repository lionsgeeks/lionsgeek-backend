<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterviewMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $full_name;
    public $day;
    public $timeSlot;
    public $date;
    public $exactTime;

    /**
     * Create a new message instance.
     */
    public function __construct($full_name, $day, $timeSlot)
    {
        $this->full_name = $full_name;
        $this->day = $day;
        $this->timeSlot = $timeSlot;

        $carbonInstance = Carbon::parse($timeSlot);
        $this->date = $carbonInstance->toDateString(); // e.g., 2025-01-24
        $this->exactTime = $carbonInstance->format('H:i'); // e.g., 16:44
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invitation to Your Interview at Lionsgeek!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'maizzleMails.emails.interviewmail',
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
