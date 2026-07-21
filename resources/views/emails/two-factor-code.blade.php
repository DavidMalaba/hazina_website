@component('emails.layout')
    @slot('title', 'Votre code de vérification à deux facteurs')
    @slot('headerTitle', 'Sécurité Hazina')
    @slot('greeting', 'Bonjour ' . $user->first_name . ',')

    <div class="text">
        Une demande de connexion à votre compte a été initiée. Pour valider cette connexion, veuillez utiliser le code de vérification suivant :
    </div>

    <div class="otp-box">
        <span class="otp-code">{{ $otpCode }}</span>
    </div>

    <div class="text" style="text-align: center; font-size: 14px;">
        Ce code est valide pendant 10 minutes.
    </div>

    <div class="card" style="margin-top: 30px;">
        <span class="card-title">Détails de la connexion</span>
        <div class="card-row">
            <span class="card-label">Adresse IP :</span>
            <span class="card-value">{{ $ip }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Navigateur :</span>
            <span class="card-value">{{ $device }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Localisation :</span>
            <span class="card-value">{{ $location }}</span>
        </div>
    </div>

    <div class="text" style="font-size: 14px; color: #64748b; margin-top: 20px;">
        Si vous n'êtes pas à l'origine de cette tentative de connexion, veuillez modifier votre mot de passe immédiatement ou contacter notre support.
    </div>
@endcomponent
