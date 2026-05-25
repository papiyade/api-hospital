<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SamaDoktor</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background:#f3f4f6;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 20px 0;">
        <tr>
            <td align="center">

                <!-- CARD -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08);">

                    <!-- HEADER -->
                    <tr>
                        <td style="
                            background: linear-gradient(135deg, #022c22 0%, #064e3b 35%, #047857 75%, #10b981 100%);
                            color:white;
                            padding:20px;
                            text-align:center;
                        ">
                            <h1 style="margin:0; font-size:22px;">SamaDoktor 🏥</h1>
                            <p style="margin:5px 0 0; font-size:12px; opacity:0.9;">
                                Votre santé, simplifiée
                            </p>
                        </td>
                    </tr>

                    <!-- CONTENT -->
                    <tr>
                        <td style="padding: 25px; color:#111827;">
                            @yield('content')
                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="
                            padding:15px;
                            text-align:center;
                            font-size:12px;
                            color:#6b7280;
                            border-top:1px solid #e5e7eb;
                        ">
                            © {{ date('Y') }} SamaDoktor — Tous droits réservés
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
