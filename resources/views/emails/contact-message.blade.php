@component('emails.layout')
    @slot('title', 'Nouveau message de contact')
    @slot('headerTitle', 'Nouveau Contact')
    @slot('greeting', 'Bonjour l\'équipe,')

    <div class="text">
        Un nouveau message a été envoyé via le formulaire de contact.
    </div>

    <div class="card">
        <span class="card-title">Détails de l'expéditeur</span>
        <div class="card-row">
            <span class="card-label">Nom :</span>
            <span class="card-value">{{ $contactMessage->name }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Email :</span>
            <span class="card-value">{{ $contactMessage->email }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Sujet :</span>
            <span class="card-value">{{ $contactMessage->subject }}</span>
        </div>
    </div>

    <div class="card">
        <span class="card-title">Message</span>
        <div class="text" style="margin-bottom: 0;">
            {{ $contactMessage->message }}
        </div>
    </div>
@endcomponent
