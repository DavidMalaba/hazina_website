@component('emails.layout')
    @slot('title', 'Code de connexion')
    @slot('headerTitle', 'Connexion Hazina')
    @slot('greeting', 'Bonjour ' . ($user->first_name ?: 'Entrepreneur') . ',')

    <div class="text">
        Vous avez demandé à vous connecter à votre compte Hazina Startup. Voici votre code de sécurité à 6 chiffres :
    </div>

    <div class="otp-box">
        <span class="otp-code">{{ $otp }}</span>
    </div>

    <div class="text" style="text-align: center; font-size: 14px;">
        Ce code expirera dans 15 minutes.
    </div>
@endcomponent
