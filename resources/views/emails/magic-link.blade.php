@component('emails.layout')
    @slot('title', 'Lien de Connexion')
    @slot('headerTitle', 'Connexion Rapide')
    @slot('greeting', 'Bonjour ' . ($user->first_name ?: 'Entrepreneur') . ',')

    <div class="text">
        Vous avez demandé un lien de connexion pour continuer votre inscription à la cohorte <strong>{{ $cohort->name }}</strong>.
        <br><br>
        Cliquez sur le bouton ci-dessous pour accéder directement à votre session. Ce lien est valide pendant 30 minutes.
    </div>

    <div class="button-container">
        <a href="{{ $magicLink }}" class="button">Me connecter maintenant</a>
    </div>

    <div class="text" style="font-size: 13px; color: #64748b;">
        Si le bouton ne fonctionne pas, copiez-collez ce lien :<br>
        <a href="{{ $magicLink }}" style="color: #10b981; word-break: break-all;">{{ $magicLink }}</a>
    </div>
@endcomponent
