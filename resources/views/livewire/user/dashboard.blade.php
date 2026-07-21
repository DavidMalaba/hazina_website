<div class="min-h-screen bg-slate-50 pt-28 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl font-black text-slate-900">Bonjour, {{ Auth::user()->first_name }} 👋</h1>
                <p class="text-slate-500 mt-2">Bienvenue sur votre espace personnel Hazina Startup.</p>
            </div>
            <a href="{{ route('cohorts.index') }}" wire:navigate class="inline-flex justify-center items-center py-2.5 px-6 rounded-full text-sm font-bold text-emerald-700 bg-emerald-100 hover:bg-emerald-200 transition">
                Explorer les cohortes
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Actions & Profile -->
            <div class="space-y-8 lg:col-span-1">
                <!-- Action Cards -->
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('profile') }}" wire:navigate class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 hover:shadow-md hover:border-emerald-200 transition group flex flex-col items-center text-center">
                        <div class="w-12 h-12 bg-sky-50 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Mon Profil</h3>
                        <p class="text-xs text-slate-500">Gérer mes informations</p>
                    </a>
                    <a href="{{ route('applications') }}" wire:navigate class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 hover:shadow-md hover:border-emerald-200 transition group flex flex-col items-center text-center">
                        <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Souscriptions</h3>
                        <p class="text-xs text-slate-500">Voir mon historique</p>
                    </a>
                </div>

                <!-- Incubation Programs Widget -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-emerald-500 rounded-full blur-3xl opacity-20"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <h2 class="text-xl font-bold">Mes Programmes d'Incubation</h2>
                        </div>
                        <p class="text-slate-300 text-sm mb-6 leading-relaxed">
                            Vous n'avez pas de programme d'incubation actif pour le moment. Postulez à nos cohortes pour bénéficier d'un accompagnement sur mesure.
                        </p>
                        <a href="{{ route('cohorts.index') }}" wire:navigate class="inline-flex w-full justify-center items-center py-2.5 px-4 rounded-xl text-sm font-bold text-slate-900 bg-emerald-400 hover:bg-emerald-300 transition">
                            Découvrir les programmes
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Recent Activity / Applications -->
            <div class="lg:col-span-2 space-y-6">
                
                <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-slate-900">Candidatures en cours</h2>
                        <a href="{{ route('applications') }}" wire:navigate class="text-sm font-semibold text-emerald-600 hover:text-emerald-700">Tout voir</a>
                    </div>

                    @if($draftApplications->count() > 0)
                        <div class="space-y-4">
                            @foreach($draftApplications as $app)
                                <div class="p-4 rounded-2xl bg-amber-50 border border-amber-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                            <span class="text-xs font-bold text-amber-700 uppercase tracking-wider">Brouillon non soumis</span>
                                        </div>
                                        <h3 class="font-bold text-slate-900">{{ $app->cohort->name }}</h3>
                                    </div>
                                    <a href="{{ route('cohorts.register', $app->cohort) }}" class="inline-flex justify-center items-center py-2 px-5 rounded-full text-sm font-bold text-amber-800 bg-amber-200 hover:bg-amber-300 transition shrink-0">
                                        Reprendre
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-slate-500 text-sm">Vous n'avez aucun brouillon en cours.</p>
                    @endif
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-slate-900">Dernières soumissions</h2>
                    </div>

                    @if($activeApplications->count() > 0)
                        <div class="space-y-4">
                            @foreach($activeApplications as $app)
                                <a href="{{ route('applications.show', $app->id) }}" wire:navigate class="block p-4 rounded-2xl border border-slate-100 hover:border-emerald-200 hover:bg-emerald-50/50 transition group">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="font-bold text-slate-900 group-hover:text-emerald-700 transition">{{ $app->cohort->name }}</h3>
                                        @if($app->status === 'pending')
                                            <span class="inline-flex items-center py-1 px-2.5 rounded-md text-[10px] font-bold bg-blue-100 text-blue-800 uppercase tracking-wider">En évaluation</span>
                                        @elseif($app->status === 'approved')
                                            <span class="inline-flex items-center py-1 px-2.5 rounded-md text-[10px] font-bold bg-emerald-100 text-emerald-800 uppercase tracking-wider">Approuvé</span>
                                        @endif
                                    </div>
                                    <p class="text-xs text-slate-500">Soumis le {{ $app->updated_at->format('d/m/Y') }}</p>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <p class="text-slate-500 text-sm">Aucune candidature soumise pour l'instant.</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>
