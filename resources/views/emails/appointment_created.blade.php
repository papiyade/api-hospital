@extends('emails.layout')

@section('content')
    <h2 style="margin-top:0;">Bonjour {{ $patientName }} 👋</h2>

    <p>
        Votre rendez-vous a été <strong>enregistré avec succès</strong>.
    </p>

    <div
        style="
    background:#f9fafb;
    padding:15px;
    border-radius:8px;
    border:1px solid #e5e7eb;
    margin:15px 0;
">
        <p style="margin:5px 0;"><strong>Service :</strong> {{ $serviceName }}</p>
        <p style="margin:5px 0;"><strong>Date :</strong> {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}
        à {{ \Carbon\Carbon::createFromFormat('H:i', $appointment->time)->format('H:i') }}
        </p>
        <p style="margin:5px 0;"><strong>Numéro :</strong> {{ $appointment->queue_number }}</p>
    </div>

    <p>
        Nous vous informerons dès qu’un médecin sera assigné.
    </p>

    <p style="margin-top:20px;">
        Merci,<br>
        <strong>SamaDoktor</strong>
    </p>
@endsection
