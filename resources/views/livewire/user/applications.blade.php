<div class="min-h-screen bg-slate-50 pt-28 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-black text-slate-900">Mes Souscriptions</h1>
            <p class="text-slate-500 mt-2">Suivez l'état de vos candidatures aux différentes cohortes.</p>
        </div>

        <div class="space-y-4">
            @forelse($applications as $application)
                <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden flex flex-col sm:flex-row items-center justify-between p-6 gap-6 transition-all hover:shadow-md">
                    
                    <div class="flex items-center gap-4 flex-1 w-full">
                        <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-lg">{{ $application->cohort->name }}</h3>
                            <p class="text-xs text-slate-500 mt-1">Dernière modification le {{ $application->updated_at->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-6 w-full sm:w-auto justify-between sm:justify-end">
                        
                        <div>
                            @if($application->status === 'draft')
                                <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                    Brouillon
                                </span>
                            @elseif($application->status === 'pending')
                                <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    En attente d'évaluation
                                </span>
                            @elseif($application->status === 'approved')
                                <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                    Approuvé
                                </span>
                            @elseif($application->status === 'rejected')
                                <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                    <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                    Rejeté
                                </span>
                            @endif
                        </div>

                        @if($application->status === 'draft')
                            <a href="{{ route('cohorts.register', $application->cohort) }}" class="inline-flex items-center justify-center py-2 px-5 rounded-full text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-md shadow-emerald-600/20 shrink-0">
                                Reprendre
                            </a>
                        @else
                            <a href="{{ route('applications.show', $application->id) }}" class="inline-flex items-center justify-center py-2 px-5 rounded-full text-sm font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 transition shrink-0">
                                Voir le détail
                            </a>
                        @endif

                    </div>
                </div>
            @empty
                <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-12 text-center">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Aucune souscription</h3>
                    <p class="text-slate-500 max-w-sm mx-auto mb-8">Vous n'avez pas encore postulé à une cohorte. Découvrez nos programmes ouverts !</p>
                    <a href="{{ route('cohorts.index') }}" class="inline-flex justify-center py-3 px-8 border border-transparent rounded-full shadow-lg shadow-emerald-600/20 text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition">
                        Voir les cohortes
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>
