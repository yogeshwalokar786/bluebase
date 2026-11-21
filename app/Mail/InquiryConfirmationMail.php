<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $inquiry;

    public function __construct(array $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function envelope(): Envelope
    {
        $subject = match ($this->inquiry['type'] ?? 'contact') {
            'estimate', 'trial' => 'Your Project Estimate & Roadmap Request — Bluebase Technologies',
            'demo' => 'Your Product Demo Request — Bluebase Technologies',
            'partner' => 'Your Partner Application — Bluebase Technologies',
            default => 'We Received Your Inquiry — Bluebase Technologies',
        };

        $fromAddress = config('mail.from.address', 'info@bluebasetechnologies.com');
        $fromName = config('mail.from.name', 'Bluebase Technologies');

        return new Envelope(
            from: new Address($fromAddress, $fromName),
            replyTo: [new Address($fromAddress, $fromName)],
            subject: $subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.inquiry-confirmation',
            with: [
                'inquiry' => $this->inquiry,
            ],
        );
    }
}
