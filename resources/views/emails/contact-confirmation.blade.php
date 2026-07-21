@component('emails.layout')
    @slot('title', 'Message reçu')
    @slot('headerTitle', 'Message Reçu')
    @slot('greeting', 'Bonjour ' . $contactMessage->name . ',')

    <div class="text">
        Nous avons bien reçu votre message. Notre équipe va l'étudier et vous répondra dans les plus brefs délais.
    </div>

    <div class="text">
        <strong>Rappel de votre message :</strong>
    </div>
    
    <div class="card">
        <div class="text" style="margin-bottom: 0;">
            {{ $contactMessage->message }}
        </div>
    </div>

    <div class="text" style="font-size: 14px; color: #64748b; margin-top: 20px;">
        Ceci est un email automatique confirmant la réception de votre demande.
    </div>
@endcomponent
