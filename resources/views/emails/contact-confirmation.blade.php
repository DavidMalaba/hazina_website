<x-mail::message>
# Bonjour {{ $contactMessage->name }},

Nous avons bien reçu votre message concernant : **{{ $contactMessage->subject }}**.

Toute l'équipe d'Hazina Mining Hub vous remercie de l'intérêt que vous nous portez. Nous avons bien pris note de votre demande et nous vous répondrons dans les plus brefs délais.

<x-mail::panel>
**Rappel de votre message :**
{{ $contactMessage->message }}
</x-mail::panel>

<x-mail::button :url="url('/')" color="success">
Retourner sur le site
</x-mail::button>

À très bientôt,<br>
L'équipe {{ config('app.name') }}
</x-mail::message>
