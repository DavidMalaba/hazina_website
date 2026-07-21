<div class="bg-slate-50 min-h-screen">
    @include("livewire.cohorts.register.header", ["currentStep" => 4, "cohort" => $cohort])
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="mb-8">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center shadow-sm flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-slate-900">Le Projet de {{ $company_name ?: 'votre entreprise' }}</h1>
                    <p class="text-slate-500 text-sm mt-0.5">Dernière étape {{ Auth::user()->first_name }} ! Parlez-nous de votre vision et de l'impact de votre projet</p>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="submit" class="space-y-5">
            <fieldset wire:loading.attr="disabled" wire:target="submit" class="space-y-5">
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
                                    <div class="text-xs text-slate-500">{{ $field['hint'] }}</div>
                                </div>
                            </div>
                            <div>
                                <textarea wire:model="{{ $field['model'] }}" rows="{{ $field['rows'] }}" placeholder="{{ $field['placeholder'] }}"
                                    class="w-full rounded-xl border-slate-200 bg-slate-50 focus:bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition"></textarea>
                                @error($field['model']) <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    @endforeach
            </fieldset>
            <div class="pt-6 mt-8 border-t border-slate-200 flex items-center justify-between gap-4">
                <button type="button" wire:click="previousStep" class="px-6 py-3 rounded-full font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">Retour</button>
                <button type="submit" wire:loading.attr="disabled" wire:target="submit" class="flex items-center gap-2 px-8 py-3 rounded-full font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-lg shadow-emerald-600/20 disabled:opacity-70 disabled:cursor-wait">
                    <span wire:loading.class="hidden" wire:target="submit" class="flex items-center gap-2">
                        Soumettre ma candidature <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                    <span wire:loading.class.remove="hidden" wire:target="submit" class="hidden flex items-center gap-2">
                        <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Envoi en cours...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
