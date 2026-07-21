@component('emails.layout')
    @slot('title', 'Une soirée mémorable !')
    @slot('headerTitle', 'Une soirée mémorable !')
    @slot('greeting', 'Bonjour ' . $participantName . ',')

    <div class="text">
        Toute l'équipe d'<strong>Hazina Mining Hub</strong> tenait à vous remercier chaleureusement. L'énergie, les échanges et les perspectives partagées lors de cette soirée confirment que nous sommes à l'aube d'une transformation majeure du secteur en RDC.
    </div>

    <div class="card" style="background-color: #ecfdf5; border-color: #a7f3d0; text-align: center;">
        <span class="card-title" style="color: #065f46; border-bottom: none;">Notre Vision Commune</span>
        <div class="text" style="color: #047857; margin-bottom: 20px;">
            Faire de la RDC le berceau de la "Mine 4.0", en connectant les talents locaux, l'innovation technologique et les géants de l'industrie.
        </div>
        <div class="button-container" style="margin: 10px 0;">
            <a href="{{ url('/mission-vision') }}" class="button" style="background-color: #0f172a;">Découvrir notre manifeste</a>
        </div>
    </div>

    <div class="text" style="font-weight: 700; margin-top: 30px;">
        Ils en parlent (Reportages) :
    </div>

    <div class="card">
        <span class="card-title">🎥 Reportage Univers TV</span>
        <div class="text" style="margin-bottom: 10px;">Découvrez l'interview exclusive de nos fondateurs et les réactions à chaud des participants.</div>
        <a href="#univers-tv" style="color: #10b981; font-weight: bold; text-decoration: none;">Visionner le reportage Univers TV &rarr;</a>
    </div>

    <div class="card" style="border-left: 4px solid #10b981;">
        <span class="card-title">📺 Couverture Canal 6</span>
        <div class="text" style="margin-bottom: 10px;">Un retour complet sur les enjeux abordés lors des panels et les ambitions d'Hazina.</div>
        <a href="#canal6" style="color: #10b981; font-weight: bold; text-decoration: none;">Regarder sur Canal 6 &rarr;</a>
    </div>

    <div class="text" style="font-weight: 700; margin-top: 30px;">
        Et maintenant, passons à l'action !
    </div>

    <div class="card">
        <span class="card-title">Vous êtes une startup / PME ? 🚀</span>
        <div class="text" style="margin-bottom: 15px;">Rejoignez nos cohortes d'incubation. Développez vos solutions et accédez directement aux décideurs du secteur minier.</div>
        <a href="{{ url('/programs') }}" style="color: #10b981; font-weight: bold; text-decoration: none;">Découvrir les programmes Hazina Lab &rarr;</a>
    </div>

    <div class="card">
        <span class="card-title">Vous représentez une institution ? 🤝</span>
        <div class="text" style="margin-bottom: 15px;">Devenez un partenaire stratégique. Sourcez l'innovation locale, formez vos talents et renforcez votre impact RSE.</div>
        <a href="{{ url('/become-partner') }}" style="color: #10b981; font-weight: bold; text-decoration: none;">Devenir Partenaire Officiel &rarr;</a>
    </div>

    <div class="text" style="text-align: center; font-style: italic; margin-top: 30px; background-color: #f1f5f9; padding: 20px; border-radius: 8px;">
        "Le futur des mines se construit aujourd'hui, avec vous."
    </div>
@endcomponent
