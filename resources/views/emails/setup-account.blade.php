<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Configuration de votre compte</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8fafc; padding: 40px 0;">
    <div style="max-w: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('images/logo.png') }}" alt="Hazina Hub" style="max-height: 50px;">
        </div>

        <h1 style="color: #0f172a; margin-bottom: 24px; font-size: 24px; text-align: center;">Bienvenue sur Hazina Hub</h1>
        
        <p style="color: #475569; font-size: 16px; line-height: 1.6; margin-bottom: 24px;">
            Bonjour {{ $user->first_name }},<br><br>
            Un compte administrateur a été créé pour vous sur Hazina Hub. Pour finaliser la configuration de votre compte et définir votre mot de passe, veuillez cliquer sur le bouton ci-dessous.
        </p>

        <div style="text-align: center; margin-bottom: 30px;">
            <a href="{{ $setupUrl }}" style="display: inline-block; background-color: #10b981; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: bold; font-size: 16px;">Configurer mon compte</a>
        </div>

        <p style="color: #475569; font-size: 16px; line-height: 1.6; margin-bottom: 24px;">
            Sur la page de configuration, il vous sera demandé d'entrer le code de sécurité suivant :
        </p>

        <div style="background-color: #f1f5f9; padding: 20px; border-radius: 8px; text-align: center; margin-bottom: 30px;">
            <span style="font-size: 32px; font-weight: bold; color: #10b981; letter-spacing: 4px;">{{ $otpCode }}</span>
        </div>

        <p style="color: #64748b; font-size: 14px; text-align: center;">
            Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email.
        </p>
    </div>
</body>
</html>
