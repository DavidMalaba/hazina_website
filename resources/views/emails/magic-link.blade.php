<x-mail::message>
# Bonjour {{ $user->first_name }},

Vous avez commencé votre inscription pour le programme **{{ $cohort->name }}** mais vous ne l'avez pas encore terminée.

Pour reprendre votre candidature exactement là où vous vous étiez arrêté, cliquez sur le bouton ci-dessous :

<x-mail::button :url="$url" color="success">
Reprendre mon inscription
</x-mail::button>

*Ce lien expire dans 2 heures.*

Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email.

L'équipe Hazina
</x-mail::message>
