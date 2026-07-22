@component('emails.layout')
    @slot('title', 'Bienvenue dans l\'équipe Hazina')
    @slot('headerTitle', 'Accès Administrateur')
    @slot('greeting', 'Bonjour ' . ($user->first_name ?: 'Administrateur') . ',')

    <div class="text">
        Vous avez été ajouté en tant qu'administrateur sur la plateforme Hazina. 
        Pour sécuriser votre accès et configurer votre mot de passe, veuillez cliquer sur le bouton ci-dessous :
    </div>
    
    <div class="button-container">
        <a href="{{ $setupUrl }}" class="button">Configurer mon compte administrateur</a>
    </div>

    <div class="text">
        Si le bouton ne fonctionne pas, copiez et collez le lien ci-dessous dans votre navigateur :<br>
        <a href="{{ $setupUrl }}" style="color: #10b981; font-size: 13px; word-break: break-all;">{{ $setupUrl }}</a>
    </div>
    
    <div class="text" style="margin-top: 30px;">
        Pour valider cette configuration, vous aurez besoin de ce code de sécurité à usage unique :
    </div>
    <div class="otp-box" style="margin: 10px 0 30px 0;">
        <span class="otp-code">{{ $otpCode }}</span>
    </div>
@endcomponent
