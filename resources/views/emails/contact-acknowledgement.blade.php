@component('emails.layout')
    @slot('title', 'Message reçu')
    @slot('headerTitle', 'Message Reçu')
    @slot('greeting', 'Bonjour ' . $contactMessage->name . ',')

    <div class="text">
        Nous avons bien reçu votre message concernant <strong>{{ $contactMessage->subject }}</strong> et nous vous en remercions.
        <br><br>
        Notre équipe va traiter votre demande dans les plus brefs délais.
    </div>

    <div class="card">
        <span class="card-title">Votre message :</span>
        <div class="text" style="margin-bottom: 0;">
            <em>"{{ $contactMessage->message }}"</em>
        </div>
    </div>

    <div class="text" style="margin-top: 30px;">
        En attendant notre réponse, n'hésitez pas à découvrir notre écosystème :
    </div>

    <div class="button-container" style="display: flex; flex-direction: column; gap: 10px; align-items: center;">
        <a href="{{ route('cohorts.index') }}" class="button" style="width: 250px;">S'inscrire à une cohorte</a>
        <a href="{{ route('become-partner') }}" class="button" style="background-color: #3b82f6; width: 250px;">Devenir Partenaire</a>
        <a href="{{ route('blog.index') }}" class="button" style="background-color: #64748b; width: 250px;">Lire nos articles</a>
    </div>

@endcomponent
