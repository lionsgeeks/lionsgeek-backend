<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
class BookingMailler extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $eventName;
    public $eventDescription;
    public $eventDate;
    private $qrCodeBase64;

    public function __construct($name, $qrCodeBase64, $eventName, $eventDescription, $eventDate)
    {
        $this->name = $name;
        $this->eventName = $eventName;
        $this->eventDescription = $eventDescription;
        $this->eventDate = $eventDate;
        $this->qrCodeBase64 = $qrCodeBase64;
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.bookingmailler',
            with: [
                'name' => $this->name,
                'eventName' => $this->eventName,
                'eventDescription' => $this->eventDescription,
                'eventDate' => $this->eventDate,
                'qrCode' => $this->qrCodeBase64
            ]
        );
    }
    public function attachments(): array
    {
        // Create a temporary file for the QR code
        $tempFile = tempnam(sys_get_temp_dir(), 'qr_');
        file_put_contents($tempFile, base64_decode($this->qrCodeBase64));

        return [
            Attachment::fromPath($tempFile)
                ->as('event_qr_code.png')
                ->withMime('image/png')
        ];
    }
}
