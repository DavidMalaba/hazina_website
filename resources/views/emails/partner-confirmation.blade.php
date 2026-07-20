<x-mail::message>
# Bonjour {{ $partnerRequest->contact_name }},

Nous vous confirmons la bonne réception de votre demande de partenariat pour **{{ $partnerRequest->org_name }}**.

Toute l'équipe d'Hazina Mining Hub vous remercie de l'intérêt que vous portez à notre écosystème. Nous avons bien noté vos domaines d'intérêt :
@foreach($partnerRequest->interests as $interest)
- {{ $interest }}
@endforeach

Notre équipe chargée des partenariats va examiner votre demande et vos propositions avec attention, et nous reviendrons vers vous très prochainement.

<x-mail::button :url="url('/')" color="success">
Retourner sur le site
</x-mail::button>

À très bientôt,<br>
L'équipe {{ config('app.name') }}
</x-mail::message>
