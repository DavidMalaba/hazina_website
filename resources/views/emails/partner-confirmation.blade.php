@component('emails.layout')
    @slot('title', 'Demande Reçue')
    @slot('headerTitle', 'Partenariat Hazina')
    @slot('greeting', 'Bonjour ' . $partnerRequest->contact_name . ',')

    <div class="text">
        Nous avons bien reçu votre demande de partenariat pour <strong>{{ $partnerRequest->company_name }}</strong>. 
        <br><br>
        Toute l'équipe Hazina Startup vous remercie de l'intérêt que vous portez à notre programme. Nous étudions actuellement votre proposition et reviendrons vers vous dans les plus brefs délais pour en discuter plus en détail.
    </div>

    <div class="text" style="font-size: 14px; color: #64748b;">
        Ceci est un email automatique confirmant la réception de votre demande.
    </div>
@endcomponent
