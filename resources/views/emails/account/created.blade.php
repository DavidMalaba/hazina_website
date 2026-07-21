@component('emails.layout')
    @slot('title', 'Bienvenue sur Hazina')
    @slot('headerTitle', 'Espace Entrepreneur')
    @slot('greeting', 'Bienvenue ' . $user->first_name . ',')

    <div class="text">
        Votre inscription à la plateforme <strong>Hazina Mining Hub</strong> a généré automatiquement la création de votre compte sécurisé.
        <br><br>
        Ce compte personnel est votre outil de travail principal sur notre plateforme pour :
    </div>

    <ul style="margin: 0 0 30px 0; padding: 0; list-style: none;">
        <li style="margin-bottom: 12px; font-size: 15px; color: #334155; display: table; width: 100%;">
            <span style="display: table-cell; width: 24px; color: #10b981; font-weight: bold;">✓</span>
            <span style="display: table-cell; line-height: 1.5;"><strong>Gérer votre profil d'entreprise</strong> et vos informations financières.</span>
        </li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #334155; display: table; width: 100%;">
            <span style="display: table-cell; width: 24px; color: #10b981; font-weight: bold;">✓</span>
            <span style="display: table-cell; line-height: 1.5;"><strong>Stocker vos documents légaux</strong> en un seul endroit.</span>
        </li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #334155; display: table; width: 100%;">
            <span style="display: table-cell; width: 24px; color: #10b981; font-weight: bold;">✓</span>
            <span style="display: table-cell; line-height: 1.5;"><strong>Suivre l'état d'avancement</strong> de vos candidatures.</span>
        </li>
    </ul>

    <div class="card" style="text-align: center;">
        <span class="card-title">Vos accès de connexion</span>
        <div class="card-row">
            <span class="card-label">Email :</span>
            <span class="card-value">{{ $user->email }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Code d'accès :</span>
            <span class="card-value"><span style="background-color: #e2e8f0; padding: 4px 8px; border-radius: 6px; font-family: monospace; font-size: 16px; letter-spacing: 1px; color: #0f172a;">{{ $tempPassword }}</span></span>
        </div>
        <p style="font-size: 12px; color: #64748b; margin-top: 15px; margin-bottom: 0;">
            (Nous vous invitons fortement à modifier ce code dès votre première connexion).
        </p>
    </div>

    <div class="button-container">
        <a href="{{ url('/login') }}" class="button">Me connecter à mon espace</a>
    </div>

    <div class="text" style="margin-bottom: 0;">
        Nous sommes ravis de vous compter parmi les acteurs du changement dans l'écosystème minier congolais !
    </div>
@endcomponent
