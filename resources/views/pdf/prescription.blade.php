<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        .page {
            padding: 40px;
            position: relative;
        }

        /* HEADER SOBRE */
        .header {
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 12px;
            margin-bottom: 25px;
        }

        .hospital-name {
            font-size: 20px;
            font-weight: 700;
            color: #1e3a8a;
        }

        .hospital-info {
            font-size: 12px;
            color: #6b7280;
            margin-top: 4px;
            line-height: 1.4;
        }

        /* TITLE */
        .title {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 25px 0;
            color: #111827;
        }

        /* INFO BLOCK */
        .info-grid {
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
        }

        .label {
            font-weight: 600;
            color: #374151;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead th {
            background: #1e3a8a;
            color: white;
            font-size: 12px;
            padding: 10px;
            text-align: left;
        }

        tbody td {
            border-bottom: 1px solid #e5e7eb;
            padding: 10px;
            font-size: 12.5px;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        /* FOOTER */
        .footer {
            margin-top: 60px;
            position: relative;
        }

        .signature {
            float: right;
            text-align: center;
            font-size: 12px;
            color: #374151;
        }

        .signature img {
            width: 140px;
            margin-top: 5px;
        }

        /* CACHET ROUGE */
        .stamp {
            float: left;
            width: 160px;
            height: 90px;
            border: 2px solid rgba(220, 38, 38, 0.7);
            color: rgba(220, 38, 38, 0.8);
            font-size: 11px;
            text-align: center;
            padding-top: 20px;
            transform: rotate(-10deg);
        }

        /* WATERMARK HOPITAL */
        .watermark {
            position: absolute;
            top: 40%;
            left: 10%;
            font-size: 80px;
            color: rgba(30, 58, 138, 0.05);
            transform: rotate(-30deg);
            font-weight: 700;
            pointer-events: none;
        }

        .date {
            margin-top: 25px;
            font-size: 12px;
            color: #6b7280;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
<div class="page">

    <div class="watermark">SamaDoktor</div>

    <!-- HEADER -->
    <div class="header">
        <div class="hospital-name">SamaDoktor Hospital</div>
        <div class="hospital-info">
            Dakar, Sénégal <br>
            +221 77 193 46 74 / +221 78 123 45 67 <br>
            contact@samadoktor.sn
        </div>
    </div>

    <!-- TITLE -->
    <div class="title">ORDONNANCE MÉDICALE</div>

    <!-- PATIENT INFO -->
    <div class="info-grid">
        <p><span class="label">Patient :</span> {{ $prescription->consultation->appointment->patient->user->name }}</p>
        <p><span class="label">Médecin :</span> Dr {{ $doctor->user->name }}</p>
    </div>

    <!-- MEDICATION TABLE -->
    <table>
        <thead>
        <tr>
            <th>Médicament</th>
            <th>Dosage</th>
            <th>Fréquence</th>
            <th>Durée</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prescription->medications as $med)
            <tr>
                <td>{{ $med->name }}</td>
                <td>{{ $med->pivot->dosage }}</td>
                <td>{{ $med->pivot->frequency }}</td>
                <td>{{ $med->pivot->duration }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- DATE -->
    <div class="date">
        Fait le : {{ now()->format('d/m/Y') }}
    </div>

    <!-- FOOTER -->
    <div class="footer">

        <div class="stamp">
            HÔPITAL<br>
            OFFICIEL<br>
            VALIDÉ
        </div>

        <div class="signature">
            <div>Signature du médecin</div>
            <img src="{{ $signature }}" alt="signature">
        </div>

        <div class="clear"></div>
    </div>

</div>
</body>
</html>
