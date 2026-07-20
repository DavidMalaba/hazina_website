<x-mail::message>
# Bonjour {{ $contactMessage->name }},

Nous avons bien reçu votre message concernant **"{{ $contactMessage->subject }}"** et nous vous en remercions.

Notre équipe va traiter votre demande dans les plus brefs délais.

<x-mail::panel>
**Votre message :**
*"{{ $contactMessage->message }}"*
</x-mail::panel>

---

### En attendant notre réponse, n'hésitez pas à découvrir notre écosystème :

<x-mail::button :url="route('cohorts.index')" color="success">
🚀 S'inscrire à une cohorte
</x-mail::button>

<x-mail::button :url="url('/partenaires')" color="primary">
🤝 Devenir Partenaire
</x-mail::button>

<x-mail::button :url="url('/blog')">
📰 Lire nos articles
</x-mail::button>

Merci de votre confiance,

**L'équipe {{ config('app.name') }}**
</x-mail::message>
