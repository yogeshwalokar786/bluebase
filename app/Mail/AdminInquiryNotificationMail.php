<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminInquiryNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $inquiry;

    public function __construct(array $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function envelope(): Envelope
    {
        $name = $this->inquiry['name'] ?? 'Website Visitor';
        $service = $this->inquiry['service'] ?? 'General Inquiry';
        $type = strtoupper($this->inquiry['type'] ?? 'INQUIRY');

        $fromAddress = config('mail.from.address', 'info@bluebasetechnologies.com');
        $fromName = config('mail.from.name', 'Bluebase Lead Alert');

        return new Envelope(
            from: new Address($fromAddress, $fromName),
            subject: "[{$type}] {$name} — {$service}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-inquiry-notification',
            with: [
                'inquiry' => $this->inquiry,
            ],
        );
    }
}
