<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Inter', Arial, sans-serif; background-color: #f8fafc; color: #0f172a; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .header { background-color: #0f172a; padding: 30px; text-align: center; }
        .header h1 { color: #f8fafc; margin: 0; font-size: 24px; font-weight: 600; }
        .content { padding: 40px 30px; line-height: 1.6; }
        .content p { margin-bottom: 20px; font-size: 16px; }
        .button-container { text-align: center; margin: 30px 0; }
        .button { display: inline-block; padding: 12px 24px; background-color: #10b981; color: #ffffff; text-decoration: none; font-weight: 600; border-radius: 6px; }
        .button:hover { background-color: #059669; }
        .footer { background-color: #f1f5f9; padding: 20px; text-align: center; font-size: 14px; color: #64748b; }
        .help-text { font-size: 14px; color: #64748b; margin-top: 30px; border-top: 1px solid #e2e8f0; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hazina Mining Hub</h1>
        </div>
        <div class="content">
            <p>Bonjour {{ $registration->user->first_name }},</p>
            
            <p>Nous avons remarqué que vous avez commencé votre candidature pour la cohorte <strong>{{ $registration->cohort->name }}</strong>, mais que vous ne l'avez pas encore finalisée.</p>
            
            <p>Ne perdez pas cette opportunité ! Votre dossier a été sauvegardé exactement là où vous vous étiez arrêté. Cliquez sur le bouton ci-dessous pour reprendre votre inscription de manière sécurisée, sans avoir à vous reconnecter ou recommencer :</p>
            
            <div class="button-container">
                <a href="{{ $resumeUrl }}" class="button">Reprendre ma candidature</a>
            </div>
            
            <p>Ce lien magique vous connectera automatiquement et expirera dans 3 jours pour des raisons de sécurité.</p>
            
            <p>À très bientôt sur Hazina Mining Hub !</p>
            
            <div class="help-text">
                Si le bouton ne fonctionne pas, copiez-collez ce lien dans votre navigateur :<br>
                <a href="{{ $resumeUrl }}" style="color: #3b82f6; word-break: break-all;">{{ $resumeUrl }}</a>
            </div>
        </div>
        <div class="footer">
            © {{ date('Y') }} Hazina Mining Hub. Tous droits réservés.
        </div>
    </div>
</body>
</html>
