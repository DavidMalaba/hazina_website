<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Hazina</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f8fafc; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; color: #1e293b; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f8fafc; padding-bottom: 60px; }
        .main { background-color: #ffffff; margin: 40px auto; width: 100%; max-width: 600px; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); border: 1px solid #f1f5f9; }
        
        .header { background-color: #10b981; padding: 40px 30px; text-align: center; background-image: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .header h1 { color: #ffffff; font-size: 24px; margin: 0; font-weight: 700; }
        
        .content { padding: 40px 30px; }
        .greeting { font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #0f172a; }
        .text { font-size: 15px; line-height: 1.6; color: #475569; margin-bottom: 25px; }
        
        .feature-list { margin: 0 0 30px 0; padding: 0; list-style: none; }
        .feature-item { margin-bottom: 12px; font-size: 15px; color: #334155; display: table; width: 100%; }
        .feature-icon { display: table-cell; width: 24px; color: #10b981; font-weight: bold; }
        .feature-text { display: table-cell; line-height: 1.5; }
        
        .credential-box { background-color: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 12px; padding: 25px; text-align: center; margin-bottom: 30px; }
        .credential-title { font-size: 13px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; }
        .credential-row { margin-bottom: 12px; font-size: 15px; }
        .credential-label { font-weight: 600; color: #475569; }
        .credential-value { font-weight: 700; color: #0f172a; }
        .code { background-color: #e2e8f0; padding: 4px 8px; border-radius: 6px; font-family: monospace; font-size: 16px; letter-spacing: 1px; color: #0f172a; }
        
        .button-wrapper { text-align: center; margin-bottom: 30px; }
        .button { display: inline-block; background-color: #0f172a; color: #ffffff; text-decoration: none; font-weight: 600; font-size: 15px; padding: 14px 32px; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.1), 0 2px 4px -2px rgba(15, 23, 42, 0.1); }
        
        .footer { background-color: #f1f5f9; padding: 30px; text-align: center; border-top: 1px solid #e2e8f0; }
        .footer p { font-size: 13px; color: #64748b; margin: 0 0 10px 0; }
        .logo-text { font-weight: 800; color: #0f172a; font-size: 16px; letter-spacing: -0.5px; }
        .logo-dot { color: #10b981; }
    </style>
</head>
<body>
    <div class="wrapper">
        <table class="main" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td class="header">
                    <h1>Espace Entrepreneur</h1>
                </td>
            </tr>
            <tr>
                <td class="content">
                    <div class="greeting">Bienvenue {{ $user->first_name }},</div>
                    <div class="text">
                        Votre inscription à la plateforme <strong>Hazina Mining Hub</strong> a généré automatiquement la création de votre compte sécurisé.
                        <br><br>
                        Ce compte personnel est votre outil de travail principal sur notre plateforme pour :
                    </div>

                    <ul class="feature-list">
                        <li class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span class="feature-text"><strong>Gérer votre profil d'entreprise</strong> et vos informations financières.</span>
                        </li>
                        <li class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span class="feature-text"><strong>Stocker vos documents légaux</strong> en un seul endroit.</span>
                        </li>
                        <li class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span class="feature-text"><strong>Suivre l'état d'avancement</strong> de vos candidatures.</span>
                        </li>
                    </ul>

                    <div class="credential-box">
                        <div class="credential-title">Vos accès de connexion</div>
                        <div class="credential-row">
                            <span class="credential-label">Email :</span>
                            <span class="credential-value">{{ $user->email }}</span>
                        </div>
                        <div class="credential-row">
                            <span class="credential-label">Code d'accès :</span>
                            <span class="credential-value"><span class="code">{{ $tempPassword }}</span></span>
                        </div>
                        <p style="font-size: 12px; color: #64748b; margin-top: 15px; margin-bottom: 0;">
                            (Nous vous invitons fortement à modifier ce code dès votre première connexion).
                        </p>
                    </div>

                    <div class="button-wrapper">
                        <a href="{{ url('/login') }}" class="button">Me connecter à mon espace</a>
                    </div>

                    <div class="text" style="margin-bottom: 0;">
                        Nous sommes ravis de vous compter parmi les acteurs du changement dans l'écosystème minier congolais !
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footer">
                    <p>À très bientôt,<br>L'équipe Hazina</p>
                    <div class="logo-text">Hazina<span class="logo-dot">.</span></div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
