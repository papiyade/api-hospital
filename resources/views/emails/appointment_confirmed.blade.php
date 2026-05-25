@extends('emails.layout')

@section('content')
    <h2 style="margin-top:0;">Bonjour {{ $patientName }} 👋</h2>

    <p style="font-size:16px;">
        Votre rendez-vous est <strong style="color:#10b981;">confirmé 🎉</strong>
    </p>

    <div
        style="
    background:#ecfdf5;
    padding:15px;
    border-radius:8px;
    border:1px solid #a7f3d0;
    margin:15px 0;
">
        <p style="margin:5px 0;">
            <strong>Médecin :</strong> Dr. {{ $doctorName }}
        </p>
        <p style="margin:5px 0;">
            <strong>Date :</strong> {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}
        </p>
        <p style="margin:5px 0;">
            <strong>Numéro :</strong> {{ $appointment->queue_number }}
        </p>
    </div>

    <p>
        Merci de vous présenter <strong>10 minutes à l’avance</strong>.
    </p>

    <p style="margin-top:20px;">
        À bientôt,<br>
        <strong>SamaDoktor 🏥</strong>
    </p>
@endsection
