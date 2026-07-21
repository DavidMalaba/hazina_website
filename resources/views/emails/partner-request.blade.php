@component('emails.layout')
    @slot('title', 'Nouvelle demande de partenariat')
    @slot('headerTitle', 'Nouveau Partenaire')
    @slot('greeting', 'Bonjour l\'équipe,')

    <div class="text">
        Une nouvelle demande de partenariat a été soumise sur le site Hazina Startup.
    </div>

    <div class="card">
        <span class="card-title">Détails de la demande</span>
        <div class="card-row">
            <span class="card-label">Entreprise :</span>
            <span class="card-value">{{ $partnerRequest->company_name }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Type :</span>
            <span class="card-value">{{ $partnerRequest->partnership_type }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Contact :</span>
            <span class="card-value">{{ $partnerRequest->contact_name }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Email :</span>
            <span class="card-value">{{ $partnerRequest->email }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Téléphone :</span>
            <span class="card-value">{{ $partnerRequest->phone ?? 'Non renseigné' }}</span>
        </div>
    </div>

    <div class="card">
        <span class="card-title">Message</span>
        <div class="text" style="margin-bottom: 0;">
            {{ $partnerRequest->message }}
        </div>
    </div>
@endcomponent
