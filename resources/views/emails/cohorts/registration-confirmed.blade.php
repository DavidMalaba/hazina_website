<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature Envoyée</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f8fafc; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; color: #1e293b; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f8fafc; padding-bottom: 60px; }
        .main { background-color: #ffffff; margin: 40px auto; width: 100%; max-width: 600px; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); border: 1px solid #f1f5f9; }
        .header { background-color: #0f172a; padding: 40px 30px; text-align: center; }
        .header h1 { color: #ffffff; font-size: 24px; margin: 0; font-weight: 700; }
        .header p { color: #10b981; font-size: 14px; margin-top: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
        .content { padding: 40px 30px; }
        .greeting { font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #0f172a; }
        .text { font-size: 15px; line-height: 1.6; color: #475569; margin-bottom: 30px; }
        
        .card { background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; margin-bottom: 20px; }
        .card-title { font-size: 13px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; display: block; border-bottom: 1px solid #e2e8f0; padding-bottom: 10px; }
        .card-row { margin-bottom: 10px; font-size: 14px; display: table; width: 100%; }
        .card-label { display: table-cell; font-weight: 600; color: #64748b; width: 35%; vertical-align: top; }
        .card-value { display: table-cell; font-weight: 500; color: #0f172a; width: 65%; vertical-align: top; }
        .card-row:last-child { margin-bottom: 0; }

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
                    <h1>Candidature Reçue</h1>
                    <p>{{ $cohort->name }}</p>
                </td>
            </tr>
            <tr>
                <td class="content">
                    <div class="greeting">Bonjour {{ $user->first_name }},</div>
                    <div class="text">
                        Félicitations ! Nous avons bien reçu votre candidature. Votre dossier a été transmis avec succès à notre équipe de sélection et est actuellement en cours d'examen.
                        <br><br>
                        Voici un récapitulatif des informations que nous avons enregistrées :
                    </div>

                    <!-- CARD 1 -->
                    <div class="card">
                        <span class="card-title">Profil Entrepreneur</span>
                        <div class="card-row">
                            <span class="card-label">Nom complet :</span>
                            <span class="card-value">{{ $user->first_name }} {{ $user->last_name }}</span>
                        </div>
                        <div class="card-row">
                            <span class="card-label">Email :</span>
                            <span class="card-value">{{ $user->email }}</span>
                        </div>
                        <div class="card-row">
                            <span class="card-label">Téléphone :</span>
                            <span class="card-value">{{ $user->phone }}</span>
                        </div>
                    </div>

                    <!-- CARD 2 -->
                    <div class="card">
                        <span class="card-title">L'Entreprise</span>
                        <div class="card-row">
                            <span class="card-label">Société :</span>
                            <span class="card-value">{{ $company->name }}</span>
                        </div>
                        <div class="card-row">
                            <span class="card-label">Secteur :</span>
                            <span class="card-value">{{ $company->industry_sector }}</span>
                        </div>
                        <div class="card-row">
                            <span class="card-label">Localisation :</span>
                            <span class="card-value">{{ $company->city->name ?? 'N/A' }}, {{ $company->province->name ?? 'N/A' }}</span>
                        </div>
                    </div>

                    <!-- CARD 3 -->
                    <div class="card">
                        <span class="card-title">Le Projet</span>
                        <div class="card-row">
                            <span class="card-label">Problème résolu :</span>
                            <span class="card-value">{{ \Illuminate\Support\Str::limit($registration->problem_solved, 100) }}</span>
                        </div>
                        <div class="card-row">
                            <span class="card-label">Marché cible :</span>
                            <span class="card-value">{{ \Illuminate\Support\Str::limit($registration->target_market, 100) }}</span>
                        </div>
                    </div>

                    <div class="text" style="margin-top: 30px; margin-bottom: 0;">
                        Si vous constatez une erreur, vous pourrez mettre à jour ces informations directement depuis votre Espace Entrepreneur. 
                        <strong>Surveillez votre boîte mail</strong>, nous venons de vous envoyer vos accès de connexion.
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footer">
                    <p>À très bientôt,<br>L'équipe de sélection</p>
                    <div class="logo-text">Hazina<span class="logo-dot">.</span></div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
