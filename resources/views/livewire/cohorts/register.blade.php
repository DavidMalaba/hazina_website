<div class="bg-slate-50 min-h-screen">

    {{-- ═══════════════════════════════════════════════════════════
         TOP BAR — Sticky, infos cohorte + progression
    ═══════════════════════════════════════════════════════════ --}}
    <div class="bg-slate-900 sticky top-0 z-50 border-b border-slate-800">

        {{-- Ligne 1 : retour + nom cohorte + step dots --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between gap-4">
            <a href="{{ route('cohorts.show', $cohort) }}" wire:navigate
               class="flex items-center gap-2 text-slate-400 hover:text-white transition-colors text-sm font-medium group flex-shrink-0">
                <div class="w-7 h-7 rounded-full bg-white/5 group-hover:bg-white/10 flex items-center justify-center transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </div>
                <span class="hidden sm:inline">{{ $cohort->name }}</span>
                <span class="sm:hidden">Retour</span>
            </a>

            {{-- Step indicator --}}
            <div class="flex items-center gap-3">
                @php
                    $stepLabels = [1 => 'Entrepreneur', 2 => 'Entreprise', 3 => 'Documents', 4 => 'Projet'];
                    $stepIcons = [
                        1 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>',
                        2 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
                        3 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
                        4 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
                    ];
                @endphp
                <span class="text-slate-500 text-xs hidden sm:inline flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $stepIcons[$currentStep] !!}</svg>
                    {{ $stepLabels[$currentStep] }}
                </span>
                <span class="text-slate-400 text-xs">{{ $currentStep }}/{{ $totalSteps }}</span>
                <div class="flex gap-1.5">
                    @for($i = 1; $i <= $totalSteps; $i++)
                        <div class="h-1.5 rounded-full transition-all duration-500
                            {{ $i < $currentStep ? 'w-6 bg-emerald-500' : ($i === $currentStep ? 'w-8 bg-emerald-400' : 'w-6 bg-slate-700') }}">
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        {{-- Ligne 2 : infos clés cohorte --}}
        <div class="border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2.5 flex items-center gap-6 overflow-x-auto scrollbar-hide">

                {{-- Candidatures reçues --}}
                <div class="flex items-center gap-2 flex-shrink-0">
                    <div class="w-6 h-6 bg-emerald-500/15 rounded-lg flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <span class="text-white font-bold text-sm">{{ $cohort->registrations->count() }}</span>
                        <span class="text-slate-500 text-xs ml-1">candidature(s)</span>
                    </div>
                </div>

                @if($cohort->max_participants)
                    <div class="h-3 w-px bg-slate-700 flex-shrink-0"></div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <div class="w-6 h-6 bg-amber-500/15 rounded-lg flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                        <div>
                            <span class="text-white font-bold text-sm">{{ $cohort->max_participants }}</span>
                            <span class="text-slate-500 text-xs ml-1">place(s) au total</span>
                        </div>
                    </div>
                @endif

                @if($cohort->registration_end_date)
                    <div class="h-3 w-px bg-slate-700 flex-shrink-0"></div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <div class="w-6 h-6 bg-red-500/15 rounded-lg flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <span class="text-slate-500 text-xs">Clôture :</span>
                            <span class="text-white font-semibold text-xs ml-1">{{ $cohort->registration_end_date->format('d M Y') }}</span>
                        </div>
                    </div>
                @endif

                <div class="h-3 w-px bg-slate-700 flex-shrink-0"></div>
                <div class="flex items-center gap-2 flex-shrink-0">
                    <div class="w-6 h-6 bg-blue-500/15 rounded-lg flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <span class="text-slate-500 text-xs">Début :</span>
                        <span class="text-white font-semibold text-xs ml-1">{{ $cohort->start_date->format('d M Y') }}</span>
                    </div>
                </div>

                <div class="h-3 w-px bg-slate-700 flex-shrink-0"></div>
                <div class="flex items-center gap-2 flex-shrink-0">
                    <div class="w-6 h-6 bg-slate-600/40 rounded-lg flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <span class="text-white font-semibold text-xs">{{ (int) $cohort->start_date->diffInMonths($cohort->end_date) }} mois</span>
                        <span class="text-slate-500 text-xs ml-1">d'accompagnement</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════
         CONTENU FORMULAIRE
    ═══════════════════════════════════════════════════════════ --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- ── ÉCRAN DE SUCCÈS ── --}}
        @if($isSubmitted)
            <div class="flex flex-col items-center justify-center min-h-[60vh] text-center max-w-2xl mx-auto">
                <div class="w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center mb-8 relative">
                    <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-20"></div>
                    <svg class="w-12 h-12 text-emerald-600 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h1 class="text-3xl font-black text-slate-900 mb-4">Candidature envoyée avec succès !</h1>
                <p class="text-slate-600 text-lg mb-8 leading-relaxed">
                    Merci pour votre intérêt pour la <span class="font-bold text-slate-900">{{ $cohort->name }}</span>. Votre dossier a bien été transmis à notre équipe.
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

                <a href="{{ route('cohorts.show', $cohort) }}" wire:navigate class="inline-flex items-center justify-center px-8 py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-full transition shadow-lg">
                    Retour à la page de la cohorte
                </a>
            </div>

        {{-- ── ÉCRAN DE REPRISE DE BROUILLON ── --}}
        @elseif($showDraftScreen)
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
                                <span class="font-semibold text-slate-700">{{ $currentStep - 1 }}/{{ $totalSteps }} étapes complétées</span>
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
                <div class="flex flex-row gap-3 w-full max-w-2xl">
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

        {{-- ── FORMULAIRE NORMAL ── --}}
        @else
        <div class="max-w-3xl mx-auto">

        {{-- Step header --}}
        @php
            $stepMeta = [
                1 => ['title' => "L'Entrepreneur", 'subtitle' => 'Parlez-nous de vous et de votre parcours',
                      'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>'],
                2 => ['title' => "L'Entreprise", 'subtitle' => 'Votre structure, vos activités et votre marché',
                      'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>'],
                3 => ['title' => 'Documents Légaux', 'subtitle' => 'Attestez la formalisation de votre entreprise',
                      'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>'],
                4 => ['title' => 'Motivation & Projet', 'subtitle' => 'Votre vision, votre impact et vos ambitions',
                      'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>'],
            ];
            $meta = $stepMeta[$currentStep];
        @endphp

        <div class="mb-8">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center shadow-sm flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $meta['svg'] !!}</svg>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-slate-900">{{ $meta['title'] }}</h1>
                    <p class="text-slate-500 text-sm mt-0.5">{{ $meta['subtitle'] }}</p>
                </div>
            </div>
        </div>

        <form wire:submit="submit" class="space-y-5">

            {{-- ─────────────────────────────────────────
                 STEP 1 : Entrepreneur
            ───────────────────────────────────────── --}}
            @if($currentStep == 1)
                <div class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Prénom <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="first_name" placeholder="Jean-Jacques"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-slate-900 placeholder-slate-400 text-sm transition">
                            @error('first_name') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Nom <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="last_name" placeholder="Mutombo"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-slate-900 placeholder-slate-400 text-sm transition">
                            @error('last_name') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Email <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </span>
                                <input type="email" wire:model="email" placeholder="jean@exemple.com"
                                    class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 pl-10 pr-4 text-sm transition">
                            </div>
                            @error('email') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Téléphone <span class="text-red-500">*</span></label>
                            <div class="relative flex">
                                <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-slate-200 bg-slate-50 text-slate-500 text-sm font-semibold">
                                    +243
                                </span>
                                <input type="tel" wire:model="phone" placeholder="81X XXX XXX" maxlength="9" pattern="[0-9]{9}"
                                    class="w-full rounded-r-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                            </div>
                            @error('phone') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Genre <span class="text-red-500">*</span></label>
                            <select wire:model="gender" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-slate-900 text-sm transition">
                                <option value="">Sélectionner</option>
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                            </select>
                            @error('gender') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Date de naissance</label>
                            <input type="date" wire:model="birthdate"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-slate-900 text-sm transition">
                            @error('birthdate') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">À propos de vous <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                        <textarea wire:model="bio" rows="4" placeholder="Votre parcours, vos expertises, ce qui vous définit en tant qu'entrepreneur..."
                            class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm resize-none transition"></textarea>
                    </div>
                </div>
            @endif

            {{-- ─────────────────────────────────────────
                 STEP 2 : Entreprise
            ───────────────────────────────────────── --}}
            @if($currentStep == 2)
                <div class="space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Nom de l'entreprise / projet <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="company_name" placeholder="ex: TechMines Solutions"
                            class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                        @error('company_name') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Description de l'entreprise <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                        <textarea wire:model="company_description" rows="3" placeholder="Mission, proposition de valeur, activités principales..."
                            class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm resize-none transition"></textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Durée d'existence <span class="text-red-500">*</span></label>
                            <select wire:model="business_age_range" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <optgroup label="Moins d'un an">
                                    <option value="0-3mois">0 – 3 mois</option>
                                    <option value="3-6mois">3 – 6 mois</option>
                                    <option value="6-12mois">6 – 12 mois</option>
                                </optgroup>
                                <optgroup label="Années">
                                    <option value="1-2ans">1 – 2 ans</option>
                                    <option value="2-5ans">2 – 5 ans</option>
                                    <option value="5-10ans">5 – 10 ans</option>
                                    <option value="10ans+">Plus de 10 ans</option>
                                </optgroup>
                            </select>
                            @error('business_age_range') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Secteur d'activité <span class="text-red-500">*</span></label>
                            <select wire:model="industry_sector" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <option value="mines_artisanales">Mines artisanales</option>
                                <option value="mines_industrielles">Mines industrielles</option>
                                <option value="transformation_minerais">Transformation de minerais</option>
                                <option value="logistique_transport">Logistique & Transport minier</option>
                                <option value="technologie_miniere">Technologie minière / GeoTech</option>
                                <option value="commerce_negoce">Commerce & Négoce</option>
                                <option value="energie">Énergie (solaire, hydraulique…)</option>
                                <option value="agriculture">Agriculture / Agro-industrie</option>
                                <option value="sante">Santé & Bien-être</option>
                                <option value="education_formation">Éducation & Formation</option>
                                <option value="finance_fintech">Finance & Fintech</option>
                                <option value="btp_construction">BTP & Construction</option>
                                <option value="environnement">Environnement & Développement durable</option>
                                <option value="autre">Autre</option>
                            </select>
                            @error('industry_sector') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Nombre d'employés <span class="text-red-500">*</span></label>
                            <select wire:model="employee_count" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <option value="solo">Je travaille seul(e)</option>
                                <option value="2-5">2 – 5 employés</option>
                                <option value="6-10">6 – 10 employés</option>
                                <option value="11-25">11 – 25 employés</option>
                                <option value="26-50">26 – 50 employés</option>
                                <option value="50+">Plus de 50 employés</option>
                            </select>
                            @error('employee_count') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Chiffre d'affaires annuel <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                            <select wire:model="revenue_range" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <option value="0">Pas encore de revenus</option>
                                <option value="moins-5k">Moins de 5 000 $</option>
                                <option value="5k-20k">5 000 $ – 20 000 $</option>
                                <option value="20k-50k">20 000 $ – 50 000 $</option>
                                <option value="50k-100k">50 000 $ – 100 000 $</option>
                                <option value="100k-500k">100 000 $ – 500 000 $</option>
                                <option value="500k+">Plus de 500 000 $</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Clients / Partenaires actuels <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                            <select wire:model="client_count_range" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <option value="0">Aucun pour l'instant</option>
                                <option value="1-5">1 – 5</option>
                                <option value="6-20">6 – 20</option>
                                <option value="21-50">21 – 50</option>
                                <option value="51-200">51 – 200</option>
                                <option value="200+">Plus de 200</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Email entreprise <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                            <input type="email" wire:model="company_email" placeholder="contact@entreprise.com"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                            @error('company_email') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Site web <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                            </span>
                            <input type="url" wire:model="company_website" placeholder="https://monentreprise.com"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 pl-9 pr-4 text-sm transition">
                        </div>
                        @error('company_website') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div class="bg-slate-100/80 rounded-2xl p-5 space-y-4">
                        <div class="flex items-center gap-2 text-xs font-bold text-slate-600 uppercase tracking-wider">
                            <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Localisation
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Adresse physique <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                            <input type="text" wire:model="address" placeholder="ex: Avenue du Commerce, N° 12, Gombe"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Province <span class="text-red-500">*</span></label>
                                <select wire:model="province_id" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                    <option value="">— Sélectionner —</option>
                                    @foreach($dbProvinces as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                    @endforeach
                                </select>
                                @error('province_id') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Ville <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                                <input type="text" wire:model="city" placeholder="ex: Kinshasa"
                                    class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- ─────────────────────────────────────────
                 STEP 3 : Documents Légaux
            ───────────────────────────────────────── --}}
            @if($currentStep == 3)
                <div class="space-y-5">
                    <div class="flex items-start gap-3 bg-amber-50 border border-amber-200 rounded-2xl p-4">
                        <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-sm text-amber-800">L'upload de documents n'est <strong>pas obligatoire</strong>. Vous pourrez compléter votre dossier depuis votre espace entrepreneur ultérieurement.</p>
                    </div>

                    <label class="flex items-start gap-3 cursor-pointer p-4 rounded-2xl border-2 transition-all duration-200 {{ $has_legal_documents ? 'border-emerald-500 bg-emerald-50' : 'border-slate-200 bg-white hover:border-slate-300' }}">
                        <div class="w-5 h-5 rounded-md border-2 transition-all flex items-center justify-center flex-shrink-0 mt-0.5 {{ $has_legal_documents ? 'bg-emerald-500 border-emerald-500' : 'bg-white border-slate-300' }}">
                            <input type="checkbox" wire:model.live="has_legal_documents" class="sr-only">
                            @if($has_legal_documents)
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            @endif
                        </div>
                        <div>
                            <div class="font-semibold text-slate-900 text-sm">Mon entreprise est formellement enregistrée</div>
                            <div class="text-slate-500 text-xs mt-0.5">Je possède au moins un document légal (ID NAT, RCCM ou NIF).</div>
                        </div>
                    </label>

                    @if($has_legal_documents)
                        <div class="space-y-4">
                            @foreach([
                                ['field_num' => 'id_nat', 'field_file' => 'id_nat_file', 'input_id' => 'id_nat_file_input',
                                 'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"/>',
                                 'color' => 'blue', 'label' => 'Identification Nationale (ID NAT)', 'sub' => 'Numéro et document officiel', 'placeholder' => 'ex: CD-KIN-2024-XXXXXX'],
                                ['field_num' => 'rccm', 'field_file' => 'rccm_file', 'input_id' => 'rccm_file_input',
                                 'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>',
                                 'color' => 'purple', 'label' => 'Registre de Commerce (RCCM)', 'sub' => "Numéro d'immatriculation", 'placeholder' => 'ex: CD/KIN/RCCM/24-B-XXXXX'],
                                ['field_num' => 'tax_id', 'field_file' => 'tax_id_file', 'input_id' => 'tax_id_file_input',
                                 'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>',
                                 'color' => 'emerald', 'label' => "Numéro d'Impôt (NIF)", 'sub' => "Numéro d'identification fiscale", 'placeholder' => 'ex: A2413XXXXX'],
                            ] as $doc)
                                @php $colorMap = ['blue' => 'bg-blue-100 text-blue-600', 'purple' => 'bg-purple-100 text-purple-600', 'emerald' => 'bg-emerald-100 text-emerald-600']; @endphp
                                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                                    <div class="flex items-center gap-3 px-5 py-3.5 border-b border-slate-100 bg-slate-50/80">
                                        <div class="w-8 h-8 rounded-xl {{ $colorMap[$doc['color']] }} flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $doc['svg'] !!}</svg>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900 text-sm">{{ $doc['label'] }}</div>
                                            <div class="text-xs text-slate-500">{{ $doc['sub'] }}</div>
                                        </div>
                                    </div>
                                    <div class="p-5 space-y-4">
                                        <div>
                                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Numéro</label>
                                            <input type="text" wire:model="{{ $doc['field_num'] }}" placeholder="{{ $doc['placeholder'] }}"
                                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-2.5 px-3 text-sm transition">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Document (PDF, JPG, PNG — max 5 Mo)</label>
                                            @if($this->{$doc['field_file']})
                                                <div class="flex items-center justify-between bg-emerald-50 border border-emerald-200 rounded-xl px-4 py-3">
                                                    <div class="flex items-center gap-3 min-w-0">
                                                        <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                        </div>
                                                        <span class="text-sm font-medium text-emerald-800 truncate">{{ $this->{$doc['field_file']}->getClientOriginalName() }}</span>
                                                    </div>
                                                    <button type="button" wire:click="clearFile('{{ $doc['field_file'] }}')"
                                                        class="flex-shrink-0 w-7 h-7 bg-red-100 hover:bg-red-200 text-red-500 rounded-full flex items-center justify-center transition ml-3">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                                    </button>
                                                </div>
                                            @else
                                                <label for="{{ $doc['input_id'] }}" class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-slate-200 hover:border-emerald-400 bg-slate-50 hover:bg-emerald-50/50 rounded-xl py-6 cursor-pointer transition-all duration-200 group">
                                                    <div class="w-10 h-10 bg-slate-200 group-hover:bg-emerald-100 rounded-full flex items-center justify-center transition-colors">
                                                        <svg class="w-5 h-5 text-slate-400 group-hover:text-emerald-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="text-sm font-semibold text-slate-600 group-hover:text-emerald-700">Cliquez ou glissez un fichier</span>
                                                        <p class="text-xs text-slate-400 mt-0.5">PDF, JPG, PNG jusqu'à 5 Mo</p>
                                                    </div>
                                                    <input id="{{ $doc['input_id'] }}" type="file" wire:model="{{ $doc['field_file'] }}" class="hidden" accept=".pdf,.jpg,.jpeg,.png">
                                                </label>
                                            @endif
                                            @error($doc['field_file']) <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- Plaquette de présentation --}}
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="flex items-center gap-3 px-5 py-3.5 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-violet-50/50">
                            <div class="w-8 h-8 rounded-xl bg-violet-100 text-violet-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                            </div>
                            <div>
                                <div class="font-bold text-slate-900 text-sm">Plaquette de présentation</div>
                                <div class="text-xs text-slate-500">Brochure, pitch deck ou présentation de l'entreprise <span class="text-slate-400">(optionnel)</span></div>
                            </div>
                        </div>
                        <div class="p-5">
                            @if($company_brochure)
                                <div class="flex items-center justify-between bg-violet-50 border border-violet-200 rounded-xl px-4 py-3">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="w-8 h-8 bg-violet-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                                        </div>
                                        <span class="text-sm font-medium text-violet-800 truncate">{{ $company_brochure->getClientOriginalName() }}</span>
                                    </div>
                                    <button type="button" wire:click="clearFile('company_brochure')"
                                        class="flex-shrink-0 w-7 h-7 bg-red-100 hover:bg-red-200 text-red-500 rounded-full flex items-center justify-center transition ml-3">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>
                            @else
                                <label for="company_brochure_input" class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-slate-200 hover:border-violet-400 bg-slate-50 hover:bg-violet-50/50 rounded-xl py-7 cursor-pointer transition-all duration-200 group">
                                    <div class="w-11 h-11 bg-slate-200 group-hover:bg-violet-100 rounded-full flex items-center justify-center transition-colors">
                                        <svg class="w-5 h-5 text-slate-400 group-hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                    </div>
                                    <div class="text-center">
                                        <span class="text-sm font-semibold text-slate-600 group-hover:text-violet-700">Cliquez ou glissez votre plaquette</span>
                                        <p class="text-xs text-slate-400 mt-0.5">PDF, PowerPoint, Images — max 20 Mo</p>
                                    </div>
                                    <input id="company_brochure_input" type="file" wire:model="company_brochure" class="hidden" accept=".pdf,.ppt,.pptx,.jpg,.jpeg,.png">
                                </label>
                            @endif
                            @error('company_brochure') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>

                </div>
            @endif

            {{-- ─────────────────────────────────────────
                 STEP 4 : Motivation & Projet
            ───────────────────────────────────────── --}}
            @if($currentStep == 4)
                <div class="space-y-5">
                    <div class="bg-gradient-to-br from-violet-50 to-emerald-50 border border-violet-100 rounded-2xl p-4 flex items-center gap-3">
                        <div class="w-8 h-8 bg-violet-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                        <p class="text-sm text-slate-700"><strong>Section décisive.</strong> Ces réponses permettent à notre équipe d'évaluer votre projet. Soyez précis, concret et authentique.</p>
                    </div>
                    @foreach([
                        ['model' => 'problem_solved', 'required' => true,
                         'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>',
                         'iconbg' => 'bg-red-100 text-red-600',
                         'title' => 'Quel problème résolvez-vous ?', 'hint' => 'Décrivez le problème, qui est impacté, à quelle échelle.',
                         'placeholder' => "Ex : Les mineurs artisanaux du Kivu n'ont pas accès aux marchés formels faute de traçabilité certifiée. 200 000 creuseurs concernés...", 'rows' => 4],
                        ['model' => 'solution_description', 'required' => true,
                         'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
                         'iconbg' => 'bg-blue-100 text-blue-600',
                         'title' => 'Comment le résolvez-vous ?', 'hint' => 'Votre solution, votre approche, ce qui vous différencie.',
                         'placeholder' => 'Ex : Notre plateforme mobile permet aux coopératives de générer des rapports de traçabilité horodatés acceptés par les acheteurs européens...', 'rows' => 4],
                        ['model' => 'project_description', 'required' => true,
                         'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>',
                         'iconbg' => 'bg-emerald-100 text-emerald-600',
                         'title' => "Stade d'avancement & vision", 'hint' => "Où en êtes-vous (MVP, pilote, lancement…) ? Objectifs à 2-3 ans ?",
                         'placeholder' => 'Ex : Pilote lancé jan. 2024 avec 3 coopératives (450 mineurs), 12 tonnes traitées. Objectif : 50 coopératives fin 2025...', 'rows' => 4],
                        ['model' => 'target_market', 'required' => false,
                         'svg' => '<circle cx="12" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 1v4m0 14v4M1 12h4m14 0h4m-4.636-7.364l-2.829 2.829M7.464 16.536l-2.828 2.828m13.728 0l-2.828-2.828M7.464 7.464L4.636 4.636"/>',
                         'iconbg' => 'bg-orange-100 text-orange-600',
                         'title' => 'Marché cible & clients', 'hint' => 'Vos clients idéaux, la taille du marché, les clients existants.',
                         'placeholder' => "Ex : Négociants et fonderies européens soumis au règlement EU sur les minerais de conflit. Marché estimé à 2 Mds $ en Afrique centrale...", 'rows' => 3],
                        ['model' => 'desired_partners', 'required' => false,
                         'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
                         'iconbg' => 'bg-violet-100 text-violet-600',
                         'title' => 'Partenaires & soutiens recherchés', 'hint' => 'Mentors, investisseurs, partenaires techniques souhaités via Hazina.',
                         'placeholder' => 'Ex : Partenaire technique pour notre API de certification + investisseur impact sur 18 mois + mentor en développement commercial B2B...', 'rows' => 3],
                        ['model' => 'motivation', 'required' => true,
                         'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                         'iconbg' => 'bg-yellow-100 text-yellow-600',
                         'title' => 'Pourquoi rejoindre Hazina ?', 'hint' => "Ce qui vous a attiré, ce que vous espérez en retirer concrètement.",
                         'placeholder' => "Ex : J'ai découvert Hazina au forum finance verte de Lubumbashi. Le réseau et l'accompagnement structuré me permettront d'accéder à des financements encore inaccessibles...", 'rows' => 3],
                    ] as $field)
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 space-y-3 shadow-sm">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 {{ $field['iconbg'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $field['svg'] !!}</svg>
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-slate-900">
                                        {{ $field['title'] }}
                                        @if($field['required']) <span class="text-red-500">*</span> @else <span class="text-slate-400 text-xs font-normal">(optionnel)</span> @endif
                                    </div>
                                    <div class="text-xs text-slate-500 mt-0.5">{{ $field['hint'] }}</div>
                                </div>
                            </div>
                            <textarea wire:model="{{ $field['model'] }}" rows="{{ $field['rows'] }}" placeholder="{{ $field['placeholder'] }}"
                                class="w-full rounded-xl border-slate-200 bg-slate-50 focus:bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm resize-none transition"></textarea>
                            @error($field['model']) <p class="text-red-500 text-xs flex items-center gap-1">{{ $message }}</p> @enderror
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Navigation --}}
            <div class="flex items-center justify-between pt-6 mt-2 border-t border-slate-200">
                @if($currentStep > 1)
                    <button type="button" wire:click="previousStep"
                        class="flex items-center gap-2 py-3 px-6 rounded-full border border-slate-200 bg-white text-slate-700 font-semibold text-sm hover:bg-slate-50 hover:border-slate-300 transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Précédent
                    </button>
                @else
                    <div></div>
                @endif

                @if($currentStep < $totalSteps)
                    <button type="button" wire:click="nextStep"
                        class="flex items-center gap-2 py-3 px-8 rounded-full bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm transition shadow-md">
                        Suivant
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                @else
                    <button type="submit" wire:loading.attr="disabled"
                        class="flex items-center gap-2 py-3 px-8 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm transition disabled:opacity-60 shadow-md shadow-emerald-600/25">
                        <span wire:loading.remove wire:target="submit">Soumettre ma candidature</span>
                        <span wire:loading wire:target="submit">Envoi en cours...</span>
                        <svg wire:loading.remove wire:target="submit" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <svg wire:loading wire:target="submit" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    </button>
                @endif
            </div>

        </form>

        <p class="text-center text-xs text-slate-400 mt-6 flex items-center justify-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            Progression sauvegardée automatiquement à chaque étape
        </p>

        </div> {{-- /max-w-3xl form wrapper --}}
        @endif {{-- end showDraftScreen --}}

    </div>
</div>
