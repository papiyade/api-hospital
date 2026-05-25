<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $patientName;
    public $serviceName;

    public function __construct($appointment, $patientName, $serviceName)
    {
        $this->appointment = $appointment;
        $this->patientName = $patientName;
        $this->serviceName = $serviceName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rendez-vous enregistré',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.appointment_created',
        );
    }
}
