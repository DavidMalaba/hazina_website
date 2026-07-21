<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Code de connexion</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8fafc; margin: 0; padding: 40px 20px;">
    <div style="max-w: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
        <div style="background-color: #10b981; padding: 30px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Connexion Hazina</h1>
        </div>
        <div style="padding: 40px 30px;">
            <p style="color: #334155; font-size: 16px; margin-bottom: 20px;">Bonjour {{ $user->first_name ?: 'Entrepreneur' }},</p>
            <p style="color: #475569; font-size: 16px; margin-bottom: 30px; line-height: 1.5;">Vous avez demandé à vous connecter à votre compte Hazina Startup. Voici votre code de sécurité à 6 chiffres :</p>
            
            <div style="text-align: center; margin: 40px 0;">
                <span style="display: inline-block; padding: 15px 30px; background-color: #f1f5f9; color: #0f172a; font-size: 32px; font-weight: bold; letter-spacing: 5px; border-radius: 8px; border: 1px solid #e2e8f0;">
                    {{ $otp }}
                </span>
            </div>
            
            <p style="color: #64748b; font-size: 14px; text-align: center;">Ce code expirera dans 15 minutes.</p>
            <p style="color: #64748b; font-size: 14px; text-align: center; margin-top: 30px;">Si vous n'avez pas demandé ce code, vous pouvez ignorer cet email en toute sécurité.</p>
        </div>
    </div>
</body>
</html>
