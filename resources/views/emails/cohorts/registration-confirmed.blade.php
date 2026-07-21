@component('emails.layout')
    @slot('title', 'Candidature Envoyée')
    @slot('headerTitle', 'Candidature Reçue')
    @slot('headerSubtitle', $cohort->name)
    @slot('greeting', 'Bonjour ' . $user->first_name . ',')

    <div class="text">
        Félicitations ! Nous avons bien reçu votre candidature. Votre dossier a été transmis avec succès à notre équipe de sélection et est actuellement en cours d'examen.
        <br><br>
        Voici un récapitulatif des informations que nous avons enregistrées :
    </div>

    <!-- CARD 1 -->
    <div class="card">
        <span class="card-title">Profil Entrepreneur</span>
        <div class="card-row">
            <span class="card-label">Nom complet :</span>
            <span class="card-value">{{ $user->first_name }} {{ $user->last_name }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Email :</span>
            <span class="card-value">{{ $user->email }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Téléphone :</span>
            <span class="card-value">{{ $user->phone }}</span>
        </div>
    </div>

    <!-- CARD 2 -->
    <div class="card">
        <span class="card-title">L'Entreprise</span>
        <div class="card-row">
            <span class="card-label">Société :</span>
            <span class="card-value">{{ $company->name }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Secteur :</span>
            <span class="card-value">{{ $company->industry_sector }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Localisation :</span>
            <span class="card-value">{{ $company->city->name ?? 'N/A' }}, {{ $company->province->name ?? 'N/A' }}</span>
        </div>
    </div>

    <!-- CARD 3 -->
    <div class="card">
        <span class="card-title">Le Projet</span>
        <div class="card-row">
            <span class="card-label">Problème résolu :</span>
            <span class="card-value">{{ \Illuminate\Support\Str::limit($registration->problem_solved, 100) }}</span>
        </div>
        <div class="card-row">
            <span class="card-label">Marché cible :</span>
            <span class="card-value">{{ \Illuminate\Support\Str::limit($registration->target_market, 100) }}</span>
        </div>
    </div>

    <div class="text" style="margin-top: 30px; margin-bottom: 0;">
        Si vous constatez une erreur, vous pourrez mettre à jour ces informations directement depuis votre Espace Membre (tant que les inscriptions sont ouvertes).
    </div>
@endcomponent
