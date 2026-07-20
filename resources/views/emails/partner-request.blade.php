<x-mail::message>
# Nouvelle Demande de Partenariat

Une nouvelle organisation souhaite devenir partenaire d'Hazina Mining Hub.

**Organisation :** {{ $partnerRequest->org_name }} ({{ $partnerRequest->org_type }})  
@if($partnerRequest->website)
**Site Web :** {{ $partnerRequest->website }}  
@endif

**Personne de contact :** {{ $partnerRequest->contact_name }} ({{ $partnerRequest->contact_role }})  
**Email :** {{ $partnerRequest->email }}  
**Téléphone :** {{ $partnerRequest->phone }}  

**Domaines d'intérêt :**
@foreach($partnerRequest->interests as $interest)
- {{ $interest }}
@endforeach

@if($partnerRequest->message)
**Message / Proposition de valeur :**
<x-mail::panel>
{{ $partnerRequest->message }}
</x-mail::panel>
@endif

<x-mail::button :url="'mailto:' . $partnerRequest->email" color="success">
Contacter {{ $partnerRequest->contact_name }}
</x-mail::button>

Merci,<br>
L'équipe {{ config('app.name') }}
</x-mail::message>
