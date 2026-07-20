<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Code de vérification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8fafc; padding: 40px 0;">
    <div style="max-w: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('images/logo.png') }}" alt="Hazina Hub" style="max-height: 50px;">
        </div>

        <h1 style="color: #0f172a; margin-bottom: 24px; font-size: 24px; text-align: center;">Vérification de sécurité</h1>
        
        <p style="color: #475569; font-size: 16px; line-height: 1.6; margin-bottom: 24px;">
            Bonjour {{ $user->first_name }},<br><br>
            Vous tentez de vous connecter à votre compte administrateur Hazina Hub. Veuillez utiliser le code de vérification suivant pour valider votre accès.
        </p>

        <div style="background-color: #f1f5f9; padding: 20px; border-radius: 8px; text-align: center; margin-bottom: 30px;">
            <span style="font-size: 32px; font-weight: bold; color: #10b981; letter-spacing: 4px;">{{ $otpCode }}</span>
        </div>

        @if(isset($ip))
            <div style="background-color: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; margin-bottom: 24px; font-size: 14px; color: #475569;">
                <p style="margin: 0 0 8px 0;"><strong>Détails de la tentative de connexion :</strong></p>
                <ul style="margin: 0; padding-left: 20px; line-height: 1.6;">
                    <li><strong>Date :</strong> {{ now()->format('d/m/Y à H:i') }}</li>
                    <li><strong>Lieu :</strong> {{ $location ?? 'Inconnu' }}</li>
                    <li><strong>Adresse IP :</strong> {{ $ip ?? 'Inconnue' }}</li>
                    <li><strong>Appareil :</strong> {{ $device ?? 'Inconnu' }}</li>
                </ul>
            </div>
        @endif

        <p style="color: #64748b; font-size: 14px; text-align: center;">
            Ce code expirera dans 15 minutes.<br>
            Si vous n'avez pas demandé cette connexion, vous pouvez ignorer cet email.
        </p>
    </div>
</body>
</html>
