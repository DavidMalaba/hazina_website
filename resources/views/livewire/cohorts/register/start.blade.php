<div class="bg-slate-50 min-h-screen">
    @include("livewire.cohorts.register.header", ["currentStep" => $currentStep, "cohort" => $cohort])
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="flex flex-col items-center justify-center min-h-[60vh] text-center max-w-3xl mx-auto">

            {{-- Icône --}}
            <div class="w-20 h-20 bg-slate-900 rounded-3xl flex items-center justify-center mb-6 shadow-lg">
                <svg class="w-9 h-9 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
            </div>

            <h1 class="text-2xl font-black text-slate-900 mb-2">Vous avez une candidature en cours</h1>
            <p class="text-slate-500 text-sm mb-8 max-w-sm">Nous avons retrouvé un brouillon enregistré pour cette cohorte. Souhaitez-vous reprendre là où vous en étiez ?</p>

            {{-- Carte identité --}}
            <div class="w-full max-w-2xl bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden mb-8">
                <div class="bg-slate-900 px-5 py-3 flex items-center gap-2">
                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                    <span class="text-xs font-bold text-white uppercase tracking-wider">Brouillon — Étape {{ $currentStep }}/{{ $totalSteps }}</span>
                </div>
                <div class="px-5 py-5 space-y-4">

                    {{-- Nom --}}
                    @if($first_name || $last_name)
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center font-black text-emerald-700 text-sm flex-shrink-0">
                                {{ strtoupper(substr($first_name, 0, 1) . substr($last_name, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <div class="text-xs text-slate-400 uppercase tracking-wider">Nom complet</div>
                                <div class="font-bold text-slate-900">{{ $first_name }} {{ $last_name }}</div>
                            </div>
                        </div>
                        <div class="h-px bg-slate-100"></div>
                    @endif

                    {{-- Email masqué --}}
                    @if($email)
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="text-left">
                                <div class="text-xs text-slate-400 uppercase tracking-wider">Email</div>
                                <div class="text-sm font-mono text-slate-700 tracking-wide">{{ $this->maskedEmail() }}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Téléphone masqué --}}
                    @if($phone)
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-slate-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div class="text-left">
                                <div class="text-xs text-slate-400 uppercase tracking-wider">Téléphone</div>
                                <div class="text-sm font-mono text-slate-700 tracking-wide">{{ $this->maskedPhone() }}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Progression --}}
                    <div class="h-px bg-slate-100"></div>
                    <div>
                        <div class="flex justify-between text-xs text-slate-500 mb-2">
                            <span>Progression</span>
                            <span class="font-semibold text-slate-700">{{ max(0, $currentStep - 1) }}/{{ $totalSteps }} étapes complétées</span>
                        </div>
                        <div class="flex gap-1.5">
                            @for($i = 1; $i <= $totalSteps; $i++)
                                <div class="flex-1 h-2 rounded-full {{ $i < $currentStep ? 'bg-emerald-500' : ($i === $currentStep ? 'bg-emerald-200' : 'bg-slate-100') }}"></div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row gap-3 w-full max-w-2xl">
                <button wire:click="continueDraft"
                    class="flex-1 flex items-center justify-center gap-2 py-3.5 px-6 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm transition shadow-md shadow-emerald-600/25">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    Reprendre ma candidature
                </button>
                <button wire:click="clearDraft"
                    class="flex-1 flex items-center justify-center gap-2 py-3.5 px-6 rounded-full border border-slate-200 bg-white text-slate-700 font-semibold text-sm hover:bg-slate-50 hover:border-slate-300 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Nouvelle inscription
                </button>
            </div>

        </div>
    </div>
</div>
