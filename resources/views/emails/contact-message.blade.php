<x-mail::message>
# Nouveau message de contact

Vous avez reçu un nouveau message via le formulaire de contact du site.

**Nom :** {{ $contactMessage->name }}  
**Email :** {{ $contactMessage->email }}  
**Sujet :** {{ $contactMessage->subject }}  

**Message :**
<x-mail::panel>
{{ $contactMessage->message }}
</x-mail::panel>

<x-mail::button :url="'mailto:' . $contactMessage->email" color="success">
Répondre à {{ $contactMessage->name }}
</x-mail::button>

Merci,<br>
L'équipe {{ config('app.name') }}
</x-mail::message>
