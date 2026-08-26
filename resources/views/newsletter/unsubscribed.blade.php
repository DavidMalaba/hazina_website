<x-layouts.app>
    <x-slot:title>
        Désabonnement réussi
    </x-slot>

    <div class="min-h-[60vh] flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-md text-center">
            <div>
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100">
                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Désabonnement confirmé
                </h2>
                <p class="mt-4 text-center text-sm text-gray-600">
                    Vous avez été désabonné(e) de notre newsletter avec succès. Vous ne recevrez plus d'e-mails de notre part.
                </p>
            </div>
            
            <div class="mt-8">
                <a href="{{ route('home') }}" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-slate-900 bg-emerald-500 hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
