<div class="bg-slate-50 min-h-screen py-10">
    @include("livewire.cohorts.register.header", ["currentStep" => 4, "cohort" => $cohort])
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center min-h-[60vh] text-center max-w-2xl mx-auto">
                <div class="w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center mb-8 relative">
                    <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-20"></div>
                    <svg class="w-12 h-12 text-emerald-600 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h1 class="text-3xl font-black text-slate-900 mb-4">Félicitations {{ $first_name }} ! 🎉</h1>
                <p class="text-slate-600 text-lg mb-8 leading-relaxed">
                    La candidature de <span class="font-bold text-slate-900">{{ $company_name }}</span> pour la <span class="font-bold text-slate-900">{{ $cohort->name }}</span> a bien été transmise à notre équipe avec succès.
                </p>

                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 text-left mb-8 w-full">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-blue-900 text-lg mb-1">Surveillez votre boîte mail</h3>
                            <p class="text-blue-800 text-sm leading-relaxed">
                                Vous allez recevoir d'ici quelques minutes un email de confirmation contenant :
                            </p>
                            <ul class="mt-3 space-y-2 text-sm text-blue-800">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Un récapitulatif complet de votre formulaire
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Vos accès à votre compte entrepreneur <strong>HAZINA</strong>
                                </li>
                            </ul>
                            <p class="text-blue-700 text-xs mt-4 italic">
                                Ce compte vous permettra de mettre à jour vos informations si besoin et de suivre l'évolution de votre candidature.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('cohorts.show', $cohort) }}" wire:navigate class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-full transition shadow-lg">
                        Retour à la page de la cohorte
                    </a>
                    <button type="button" wire:click="logoutAndRegisterAgain" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 font-semibold rounded-full transition shadow-sm">
                        Déconnexion / Inscrire un autre
                    </button>
                </div>
            </div>
    </div>
</div>
