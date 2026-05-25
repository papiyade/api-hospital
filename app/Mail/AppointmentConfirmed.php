<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $patientName;
    public $doctorName;

    public function __construct($appointment, $patientName, $doctorName)
    {
        $this->appointment = $appointment;
        $this->patientName = $patientName;
        $this->doctorName = $doctorName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '✅ Rendez-vous confirmé - SamaDoktor',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.appointment_confirmed',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
