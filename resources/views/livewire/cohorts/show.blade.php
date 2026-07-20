<div class="bg-white min-h-screen">

    {{-- Success Toast --}}
    @if(session()->has('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-[-1rem]"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-[-1rem]"
            class="fixed top-4 right-4 z-50 flex items-center gap-3 bg-emerald-600 text-white px-5 py-3.5 rounded-2xl shadow-lg shadow-emerald-600/30 max-w-sm">
            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>
            <div class="min-w-0">
                <p class="font-bold text-sm">Candidature envoyée !</p>
                <p class="text-emerald-100 text-xs mt-0.5">Notre équipe vous contactera très prochainement.</p>
            </div>
            <button @click="show = false" class="flex-shrink-0 ml-1 text-white/70 hover:text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    @endif

    {{-- Hero Section --}}
    <div class="relative overflow-hidden">
        @if($cohort->image)
            <div class="absolute inset-0">
                <img src="{{ asset('storage/' . $cohort->image) }}" alt="{{ $cohort->name }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 via-slate-900/70 to-slate-900/95"></div>
            </div>
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-emerald-950 to-slate-900"></div>
        @endif

        <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">

            <a href="{{ route('cohorts.index') }}" wire:navigate class="inline-flex items-center gap-2 text-emerald-400 hover:text-emerald-300 transition mb-8 text-sm font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Retour aux cohortes
            </a>

            <div class="flex flex-wrap items-center gap-3 mb-6">
                @if($cohort->status === 'open')
                    <span class="inline-flex items-center gap-1.5 bg-emerald-500 text-white text-xs font-bold px-3 py-1.5 rounded-full">
                        <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                        Inscriptions Ouvertes
                    </span>
                @elseif($cohort->status === 'upcoming')
                    <span class="inline-flex items-center gap-1.5 bg-blue-500 text-white text-xs font-bold px-3 py-1.5 rounded-full">
                        <span class="w-2 h-2 bg-white rounded-full"></span>
                        À venir
                    </span>
                @elseif($cohort->status === 'closed')
                    <span class="inline-flex items-center gap-1.5 bg-slate-500 text-white text-xs font-bold px-3 py-1.5 rounded-full">Clôturée</span>
                @else
                    <span class="inline-flex items-center gap-1.5 bg-amber-500 text-white text-xs font-bold px-3 py-1.5 rounded-full">Terminée</span>
                @endif

                @if($cohort->sector)
                    <span class="bg-white/10 text-white/80 text-xs font-medium px-3 py-1.5 rounded-full border border-white/20">{{ $cohort->sector }}</span>
                @endif
            </div>

            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight">
                {{ $cohort->name }}
            </h1>

            <p class="text-slate-300 text-lg md:text-xl max-w-2xl leading-relaxed whitespace-pre-line">
                {{ Str::limit(html_entity_decode(strip_tags(str_replace(['</p>', '<br>', '<br/>', '<br />'], "\n", $cohort->description))), 200) }}
            </p>

            @if($cohort->status === 'open')
                <div class="mt-10">
                    <a href="{{ route('cohorts.register', $cohort) }}" wire:navigate class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-400 text-white font-bold px-8 py-4 rounded-full transition-all duration-300 shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 hover:-translate-y-0.5 text-base">
                        Postuler maintenant
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- Stats Bar --}}
    <div class="bg-slate-900 border-b border-slate-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-slate-700">
                <div class="px-6 py-5 text-center">
                    <div class="text-2xl font-black text-emerald-400">{{ $cohort->registrations->count() }}</div>
                    <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider">Candidature(s)</div>
                </div>
                @if($cohort->max_participants)
                    <div class="px-6 py-5 text-center">
                        <div class="text-2xl font-black text-white">{{ $cohort->max_participants }}</div>
                        <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider">Places au total</div>
                    </div>
                @endif
                <div class="px-6 py-5 text-center">
                    <div class="text-2xl font-black text-white">{{ $cohort->start_date->format('d M') }}</div>
                    <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider">Début programme</div>
                </div>
                <div class="px-6 py-5 text-center">
                    <div class="text-2xl font-black text-white">{{ $cohort->start_date->diffInMonths($cohort->end_date) }}</div>
                    <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider">Mois d'accompagnement</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Left: Description --}}
            <div class="lg:col-span-2">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">À propos de ce programme</h2>
                <div class="prose prose-lg prose-slate prose-headings:text-slate-900 prose-a:text-emerald-600 max-w-none">
                    {!! $cohort->description !!}
                </div>

                {{-- Registered Participants Preview --}}
                @if($cohort->registrations->count() > 0)
                    <div class="mt-12">
                        <h3 class="text-xl font-bold text-slate-900 mb-4">
                            {{ $cohort->registrations->count() }} candidat(s) déjà inscrit(s)
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            @foreach($cohort->registrations->take(8) as $reg)
                                <div class="flex items-center gap-2 bg-slate-100 rounded-full px-4 py-2">
                                    <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                        {{ strtoupper(substr($reg->first_name, 0, 1) . substr($reg->last_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-slate-900">{{ $reg->first_name }} {{ $reg->last_name }}</div>
                                        <div class="text-xs text-slate-500">{{ $reg->company_name }}</div>
                                    </div>
                                </div>
                            @endforeach
                            @if($cohort->registrations->count() > 8)
                                <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 rounded-full px-4 py-2">
                                    <span class="text-sm font-medium text-emerald-700">+{{ $cohort->registrations->count() - 8 }} autres</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            {{-- Right: Info Sidebar --}}
            <div class="space-y-6">

                {{-- Brochure Card --}}
                @if($cohort->brochure)
                    <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 text-center shadow-lg">
                        <div class="w-12 h-12 bg-emerald-500/20 text-emerald-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-2">Brochure du Programme</h3>
                        <p class="text-slate-400 text-sm mb-5">Découvrez tous les détails, les critères et les avantages en téléchargeant le PDF complet.</p>
                        <a href="{{ asset('storage/' . $cohort->brochure) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full gap-2 bg-emerald-500 hover:bg-emerald-400 text-white font-bold py-3 px-4 rounded-xl transition text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Télécharger le PDF
                        </a>
                    </div>
                @endif

                {{-- Dates Card --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-900 px-6 py-4">
                        <h3 class="text-white font-bold text-sm uppercase tracking-wider">Calendrier</h3>
                    </div>
                    <div class="px-6 py-5 space-y-4">
                        @if($cohort->registration_start_date)
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <div class="text-xs text-slate-500 uppercase tracking-wider">Inscriptions</div>
                                    <div class="text-sm font-semibold text-slate-900">{{ $cohort->registration_start_date->format('d M Y') }} → {{ $cohort->registration_end_date?->format('d M Y') }}</div>
                                </div>
                            </div>
                        @endif
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-slate-500 uppercase tracking-wider">Début du programme</div>
                                <div class="text-sm font-semibold text-slate-900">{{ $cohort->start_date->format('d M Y') }}</div>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-slate-500 uppercase tracking-wider">Fin du programme</div>
                                <div class="text-sm font-semibold text-slate-900">{{ $cohort->end_date->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Places Card --}}
                @if($cohort->max_participants)
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h3 class="font-bold text-slate-900 mb-1">Capacité de la cohorte</h3>
                        <p class="text-xs text-slate-500 mb-4">Les participants sélectionnés sont gérés par l'équipe Hazina.</p>
                        <div class="flex items-end justify-between">
                            <div>
                                <div class="text-3xl font-black text-slate-900">{{ $cohort->max_participants }}</div>
                                <div class="text-xs text-slate-500 mt-0.5">places prévues</div>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-black text-emerald-600">{{ $cohort->registrations->count() }}</div>
                                <div class="text-xs text-slate-500 mt-0.5">candidatures reçues</div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- CTA Card --}}
                @if($cohort->status === 'open')
                    <div class="bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-2xl p-6 text-center">
                        <h3 class="text-white font-bold text-lg mb-2">Prêt à postuler ?</h3>
                        <p class="text-emerald-200 text-sm mb-5">Ne tardez pas ! Les places sont limitées.</p>
                        <a href="{{ route('cohorts.register', $cohort) }}" wire:navigate class="block w-full bg-white text-emerald-700 font-bold py-3 rounded-full hover:bg-emerald-50 transition text-sm">
                            Soumettre ma candidature
                        </a>
                    </div>
                @elseif($cohort->status === 'upcoming')
                    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 text-center">
                        <h3 class="text-blue-900 font-bold text-lg mb-2">Bientôt ouvert !</h3>
                        @if($cohort->registration_start_date)
                            <p class="text-blue-600 text-sm">Les inscriptions ouvriront le <strong>{{ $cohort->registration_start_date->format('d M Y') }}</strong>.</p>
                        @else
                            <p class="text-blue-600 text-sm">Revenez bientôt pour postuler.</p>
                        @endif
                    </div>
                @else
                    <div class="bg-slate-100 border border-slate-200 rounded-2xl p-6 text-center">
                        <h3 class="text-slate-700 font-bold mb-2">Inscriptions closes</h3>
                        <p class="text-slate-500 text-sm">Découvrez nos prochaines cohortes.</p>
                        <a href="{{ route('cohorts.index') }}" wire:navigate class="inline-block mt-4 text-emerald-600 font-semibold text-sm hover:underline">Voir toutes les cohortes →</a>
                    </div>
                @endif

            </div>
        </div>
    </div>

</div>
