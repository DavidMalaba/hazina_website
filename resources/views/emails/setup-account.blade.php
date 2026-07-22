@component('emails.layout')
    @slot('title', 'Configuration de votre compte')
    @slot('headerTitle', 'Configuration de compte')
    @slot('greeting', 'Bonjour ' . ($user->first_name ?: 'Entrepreneur') . ',')

    <div class="text">
        Félicitations, votre candidature a été pré-approuvée ! Pour continuer et finaliser la création de votre compte Hazina Startup, vous devez d'abord configurer un mot de passe.
    </div>
    
    <div class="button-container">
        <a href="{{ $setupUrl }}" class="button">Configurer mon mot de passe</a>
    </div>

    <div class="text">
        Si le bouton ne fonctionne pas, copiez et collez le lien ci-dessous dans votre navigateur :<br>
        <a href="{{ $setupUrl }}" style="color: #10b981; font-size: 13px; word-break: break-all;">{{ $setupUrl }}</a>
    </div>
    
    <div class="text" style="margin-top: 30px;">
        Votre code de sécurité temporaire pour cette action est :
    </div>
    <div class="otp-box" style="margin: 10px 0 30px 0;">
        <span class="otp-code">{{ $otpCode }}</span>
    </div>
@endcomponent
