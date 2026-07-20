<div>
    @if($showWidget && $cohort)
        <div x-data="{ expanded: true }" 
             class="fixed bottom-6 right-6 sm:bottom-8 sm:right-8 z-50 flex flex-col items-end">
            
            <!-- Collapsed State (Small Circle) -->
            <button x-show="!expanded" 
                    @click="expanded = true"
                    x-transition:enter="transition ease-out duration-300 delay-200"
                    x-transition:enter-start="opacity-0 scale-50"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-50"
                    class="w-14 h-14 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full shadow-lg shadow-emerald-900/20 flex items-center justify-center focus:outline-none hover:scale-110 transition-transform duration-200 relative group"
                    style="display: none;">
                
                <!-- Ping animation -->
                <span class="absolute inset-0 rounded-full border-2 border-emerald-400 animate-ping opacity-75"></span>
                
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>

                <!-- Tooltip -->
                <div class="absolute right-full mr-4 bg-slate-900 text-white text-xs px-3 py-1.5 rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
                    Cohorte Ouverte
                </div>
            </button>

            <!-- Expanded State (Card) -->
            <div x-show="expanded" 
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-12 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-12 scale-95"
                 class="w-[calc(100vw-3rem)] sm:w-96 max-w-sm relative overflow-hidden rounded-2xl bg-white shadow-2xl shadow-emerald-900/10 border border-slate-200/60 flex flex-col group">
                
                <!-- Background decorative elements -->
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/20 transition-all duration-500 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-20 h-20 bg-emerald-500/10 rounded-full blur-xl group-hover:bg-emerald-500/20 transition-all duration-500 pointer-events-none"></div>
                
                <!-- Close Button -->
                <button @click.prevent="expanded = false" class="absolute top-3 right-3 p-1.5 rounded-full bg-slate-100/50 hover:bg-slate-200 text-slate-400 hover:text-slate-600 transition-colors z-50 backdrop-blur-sm focus:outline-none cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <!-- Header badge -->
                <div class="px-5 pt-5 pb-3 relative z-10">
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-100 border border-emerald-200 text-[10px] font-bold text-emerald-700 uppercase tracking-wider mb-3">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        Inscriptions Ouvertes
                    </div>
                    
                    <h4 class="text-lg font-bold text-slate-900 leading-tight mb-1">
                        {{ $cohort->name }}
                    </h4>
                    
                    <p class="text-sm text-slate-500 line-clamp-2">
                        Prêt à propulser votre entreprise dans le secteur minier ? Rejoignez la nouvelle cohorte !
                    </p>
                </div>

                <!-- Footer details & CTA -->
                <div class="bg-slate-50 border-t border-slate-100 p-5 mt-auto relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex flex-col">
                            @if($cohort->registration_end_date)
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Clôture le</span>
                                <span class="text-sm font-semibold text-slate-700 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $cohort->registration_end_date->format('d M Y') }}
                                </span>
                            @else
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Statut</span>
                                <span class="text-sm font-semibold text-emerald-600 flex items-center gap-1">
                                    En cours
                                </span>
                            @endif
                        </div>
                        <div class="flex flex-col text-right">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Places</span>
                            <span class="text-sm font-semibold text-slate-700 flex items-center gap-1 justify-end">
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                {{ $cohort->max_participants }} max
                            </span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('cohorts.show', $cohort) }}" wire:navigate class="flex items-center justify-center py-2.5 px-3 rounded-xl bg-white border border-slate-200 hover:border-emerald-500 hover:text-emerald-600 text-slate-700 font-semibold text-sm transition-all duration-300 shadow-sm text-center">
                            En savoir plus
                        </a>
                        <a href="{{ route('cohorts.register', $cohort) }}" wire:navigate class="flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-xl bg-slate-900 hover:bg-emerald-600 text-white font-semibold text-sm transition-all duration-300 shadow-md hover:shadow-emerald-600/30 text-center">
                            S'inscrire
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
