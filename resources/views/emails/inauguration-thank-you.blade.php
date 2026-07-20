<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci pour votre présence - Hazina Mining Hub</title>
    <style>
        /* Reset and base styles */
        body, p, h1, h2, h3, h4, h5, h6 { margin: 0; padding: 0; }
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f3f4f6; color: #1e293b; line-height: 1.6; -webkit-font-smoothing: antialiased; }
        table { border-collapse: collapse; border-spacing: 0; width: 100%; }
        img { max-width: 100%; height: auto; border: 0; display: block; }
        a { text-decoration: none; }
        
        /* Layout */
        .wrapper { background-color: #f3f4f6; padding: 40px 10px; }
        .container { max-width: 650px; margin: 0 auto; background-color: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1); }
        
        /* Header */
        .header { background-color: #ffffff; padding: 30px; text-align: center; border-bottom: 1px solid #f1f5f9; }
        .header img { height: 60px; margin: 0 auto; }
        
        /* Hero Banner with Image */
        .hero-banner { position: relative; background-color: #0f172a; text-align: center; }
        .hero-bg { width: 100%; height: 250px; object-fit: cover; opacity: 0.6; }
        .hero-content { padding: 40px 30px; background: linear-gradient(135deg, #0f172a 0%, #064e3b 100%); text-align: center; }
        .hero-content h1 { color: #ffffff; font-size: 28px; font-weight: 800; margin-bottom: 15px; letter-spacing: -0.5px; }
        .hero-content p { color: #d1fae5; font-size: 16px; margin-bottom: 25px; line-height: 1.5; }
        
        /* Content */
        .content { padding: 40px 30px; }
        .greeting { font-size: 22px; font-weight: 700; color: #0f172a; margin-bottom: 20px; }
        .text { font-size: 16px; color: #334155; margin-bottom: 30px; line-height: 1.8; }
        
        /* Buttons */
        .btn { display: inline-block; padding: 14px 30px; border-radius: 50px; font-weight: 700; font-size: 15px; text-align: center; transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 0.5px; }
        .btn-primary { background-color: #059669; color: #ffffff; box-shadow: 0 4px 14px 0 rgba(5, 150, 105, 0.4); }
        .btn-white { background-color: #ffffff; color: #059669; }
        .btn-dark { background-color: #0f172a; color: #ffffff; }
        
        /* Highlight Box (Vision) */
        .vision-box { background-color: #ecfdf5; border-radius: 16px; padding: 30px; margin-bottom: 30px; text-align: center; border: 1px solid #a7f3d0; }
        .vision-box h3 { color: #065f46; font-size: 20px; margin-bottom: 10px; }
        .vision-box p { color: #047857; font-size: 15px; margin-bottom: 20px; }
        
        /* Grid for Media / Press */
        .media-grid { display: block; margin-bottom: 40px; }
        .media-card { background-color: #f8fafc; border-radius: 12px; padding: 20px; margin-bottom: 15px; border-left: 4px solid #0f172a; }
        .media-card h4 { color: #0f172a; font-size: 16px; margin-bottom: 5px; }
        .media-card p { color: #64748b; font-size: 14px; margin-bottom: 15px; }
        .media-card a { color: #0f172a; font-weight: 600; font-size: 14px; text-decoration: underline; }

        /* Feature Cards (Startups / Partners) */
        .features { margin-bottom: 30px; }
        .feature-item { margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #e2e8f0; }
        .feature-item:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        .feature-item h3 { color: #0f172a; font-size: 18px; margin-bottom: 8px; }
        .feature-item p { color: #475569; font-size: 15px; margin-bottom: 12px; }
        .feature-item a { color: #059669; font-weight: 700; font-size: 15px; }

        /* Footer */
        .footer { background-color: #0f172a; padding: 40px 30px; text-align: center; }
        .footer p { color: #94a3b8; font-size: 14px; margin-bottom: 10px; }
        .social-links { margin-top: 20px; }
        .social-links a { display: inline-block; margin: 0 10px; color: #ffffff; font-weight: 600; font-size: 14px; background-color: rgba(255,255,255,0.1); padding: 8px 16px; border-radius: 50px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <!-- Header Logo -->
            <div class="header">
                <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="Hazina Mining Hub" onerror="this.onerror=null; this.src='https://via.placeholder.com/200x60?text=Hazina+Mining+Hub';">
            </div>

            <!-- Hero Banner -->
            <div class="hero-content">
                <h1>Une soirée mémorable !</h1>
                <p>Votre présence à notre inauguration a fait toute la différence. Revivez les meilleurs moments de cet événement historique pour l'écosystème minier.</p>
                <a href="{{ url('/#galerie-inauguration') }}" class="btn btn-primary">Voir la galerie photos</a>
            </div>

            <!-- Content -->
            <div class="content">
                <p class="greeting">Bonjour {{ $participantName }},</p>
                
                <p class="text">
                    Toute l'équipe d'<strong>Hazina Mining Hub</strong> tenait à vous remercier chaleureusement. L'énergie, les échanges et les perspectives partagées lors de cette soirée confirment que nous sommes à l'aube d'une transformation majeure du secteur en RDC.
                </p>

                <!-- Vision Box -->
                <div class="vision-box">
                    <h3>Notre Vision Commune</h3>
                    <p>Faire de la RDC le berceau de la "Mine 4.0", en connectant les talents locaux, l'innovation technologique et les géants de l'industrie.</p>
                    <a href="{{ url('/mission-vision') }}" class="btn btn-dark">Découvrir notre manifeste</a>
                </div>

                <p class="text" style="font-weight: 700; font-size: 20px; color: #0f172a; margin-top: 40px; margin-bottom: 20px; border-bottom: 2px solid #059669; padding-bottom: 10px; display: inline-block;">
                    Ils en parlent (Reportages)
                </p>

                <!-- Media Grid -->
                <div class="media-grid">
                    <div class="media-card">
                        <h4>🎥 Reportage Univers TV</h4>
                        <p>Découvrez l'interview exclusive de nos fondateurs et les réactions à chaud des participants.</p>
                        <a href="#univers-tv">Visionner le reportage Univers TV &rarr;</a>
                    </div>
                    <div class="media-card" style="border-left-color: #059669;">
                        <h4>📺 Couverture Canal 6</h4>
                        <p>Un retour complet sur les enjeux abordés lors des panels et les ambitions d'Hazina.</p>
                        <a href="#canal6" style="color: #059669;">Regarder sur Canal 6 &rarr;</a>
                    </div>
                </div>

                <p class="text" style="font-weight: 700; font-size: 20px; color: #0f172a; margin-top: 20px; margin-bottom: 20px; border-bottom: 2px solid #0f172a; padding-bottom: 10px; display: inline-block;">
                    Et maintenant, passons à l'action !
                </p>

                <!-- Features -->
                <div class="features">
                    <div class="feature-item">
                        <h3>Vous êtes une startup / PME ? 🚀</h3>
                        <p>Rejoignez nos cohortes d'incubation. Développez vos solutions et accédez directement aux décideurs du secteur minier.</p>
                        <a href="{{ url('/programs') }}">Découvrir les programmes Hazina Lab &rarr;</a>
                    </div>

                    <div class="feature-item">
                        <h3>Vous représentez une institution ou un groupe minier ? 🤝</h3>
                        <p>Devenez un partenaire stratégique. Sourcez l'innovation locale, formez vos talents et renforcez votre impact RSE.</p>
                        <a href="{{ url('/become-partner') }}">Devenir Partenaire Officiel &rarr;</a>
                    </div>
                </div>

                <p class="text" style="margin-top: 40px; background-color: #f1f5f9; padding: 20px; border-radius: 12px; text-align: center; font-style: italic;">
                    "Le futur des mines se construit aujourd'hui, avec vous."
                </p>

                <p class="text" style="font-weight: 700; color: #0f172a; text-align: center;">
                    À très bientôt,<br>
                    L'équipe {{ config('app.name') }}
                </p>
            </div>

            <!-- Footer -->
            <div class="footer">
                <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="Hazina" style="height: 40px; margin: 0 auto 20px; filter: brightness(0) invert(1);" onerror="this.onerror=null; this.src='https://via.placeholder.com/100x30?text=Hazina';">
                <p>&copy; {{ date('Y') }} Hazina Mining Hub. Tous droits réservés.</p>
                <p>Silikin Village, Kinshasa, RDC</p>
                <div class="social-links">
                    <a href="https://twitter.com/hazinahub">X (Twitter)</a>
                    <a href="https://facebook.com/share/1E7BjBojks/?mibextid=wwXIfr">Facebook</a>
                    <a href="https://www.linkedin.com/company/naissance-mark%C3%A9ting/">LinkedIn</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
