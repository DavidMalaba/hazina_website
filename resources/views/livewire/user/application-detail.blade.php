<div class="min-h-screen bg-slate-50 pt-28 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8 flex items-center justify-between flex-wrap gap-4">
            <div>
                <a href="{{ route('applications') }}" wire:navigate class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-emerald-600 transition mb-3">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Retour aux souscriptions
                </a>
                <h1 class="text-3xl font-black text-slate-900">Détails de la Souscription</h1>
                <p class="text-slate-500 mt-2">Cohorte : <span class="font-bold text-slate-700">{{ $application->cohort->name }}</span></p>
            </div>
            
            <div>
                @if($application->status === 'draft')
                    <span class="inline-flex items-center gap-1.5 py-1.5 px-4 rounded-full text-sm font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        Brouillon en cours
                    </span>
                @elseif($application->status === 'pending')
                    <span class="inline-flex items-center gap-1.5 py-1.5 px-4 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 border border-blue-200">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                        En attente d'évaluation
                    </span>
                @elseif($application->status === 'approved')
                    <span class="inline-flex items-center gap-1.5 py-1.5 px-4 rounded-full text-sm font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Candidature Approuvée
                    </span>
                @elseif($application->status === 'rejected')
                    <span class="inline-flex items-center gap-1.5 py-1.5 px-4 rounded-full text-sm font-semibold bg-red-100 text-red-800 border border-red-200">
                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                        Candidature Rejetée
                    </span>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-8">
                
                <h3 class="text-lg font-bold text-emerald-700 border-b border-slate-100 pb-3 mb-6">Informations sur l'Entreprise</h3>
                
                @if($application->company)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Nom de l'entreprise</p>
                            <p class="text-sm font-medium text-slate-900">{{ $application->company->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Type juridique</p>
                            <p class="text-sm font-medium text-slate-900">{{ $application->company->legal_status ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">RCCM / ID Nat</p>
                            <p class="text-sm font-medium text-slate-900">{{ $application->company->rccm ?? '-' }} / {{ $application->company->id_nat ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Secteur d'activité</p>
                            <p class="text-sm font-medium text-slate-900">{{ $application->company->industry_sector ?? '-' }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Localisation</p>
                            <p class="text-sm font-medium text-slate-900">
                                {{ $application->company->address ?? '' }} 
                                {{ $application->company->city ? ', ' . $application->company->city->name : '' }}
                                {{ $application->company->province ? ' (' . $application->company->province->name . ')' : '' }}
                            </p>
                        </div>
                    </div>
                @else
                    <p class="text-sm text-slate-500 italic mb-8">Les informations de l'entreprise n'ont pas encore été renseignées.</p>
                @endif

                <h3 class="text-lg font-bold text-emerald-700 border-b border-slate-100 pb-3 mb-6 mt-8">Détails du Projet</h3>
                
                <div class="space-y-6">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Problème à résoudre</p>
                        <div class="bg-slate-50 p-4 rounded-xl text-sm text-slate-700 leading-relaxed border border-slate-100">
                            {{ $application->problem_solved ?: 'Non renseigné' }}
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Marché Cible</p>
                        <div class="bg-slate-50 p-4 rounded-xl text-sm text-slate-700 leading-relaxed border border-slate-100">
                            {{ $application->target_market ?: 'Non renseigné' }}
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Avantage Compétitif</p>
                        <div class="bg-slate-50 p-4 rounded-xl text-sm text-slate-700 leading-relaxed border border-slate-100">
                            {{ $application->competitive_advantage ?: 'Non renseigné' }}
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Modèle de Revenus</p>
                        <div class="bg-slate-50 p-4 rounded-xl text-sm text-slate-700 leading-relaxed border border-slate-100">
                            {{ $application->revenue_model ?: 'Non renseigné' }}
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Partenaires / Accompagnements Souhaités</p>
                        <div class="bg-slate-50 p-4 rounded-xl text-sm text-slate-700 leading-relaxed border border-slate-100">
                            @if(is_array($application->desired_partners) && count($application->desired_partners) > 0)
                                <ul class="list-disc pl-4 space-y-1">
                                    @foreach($application->desired_partners as $partner)
                                        <li>{{ $partner }}</li>
                                    @endforeach
                                </ul>
                            @else
                                Non renseigné
                            @endif
                        </div>
                    </div>
                </div>

                @if($application->status === 'draft')
                    <div class="mt-10 pt-6 border-t border-slate-100 flex justify-center">
                        <a href="{{ route('cohorts.register', $application->cohort) }}" class="inline-flex justify-center py-3.5 px-8 border border-transparent rounded-full shadow-lg shadow-emerald-600/20 text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none transition">
                            Continuer l'inscription à l'étape en cours
                        </a>
                    </div>
                @elseif($application->status === 'pending')
                    <div class="mt-10 pt-6 border-t border-slate-100 flex flex-col items-center justify-center gap-3">
                        @if($application->cohort->isRegistrationOpen())
                            <a href="{{ route('cohorts.register.step1', $application->cohort) }}" class="inline-flex justify-center py-3.5 px-8 border border-transparent rounded-full shadow-lg shadow-emerald-600/20 text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none transition">
                                Modifier ma candidature
                            </a>
                            <p class="text-xs text-slate-500">Vous pouvez modifier votre candidature jusqu'à la clôture des inscriptions.</p>
                        @else
                            <button type="button" disabled class="inline-flex justify-center py-3.5 px-8 border border-slate-200 rounded-full text-sm font-bold text-slate-400 bg-slate-50 cursor-not-allowed">
                                Modifier ma candidature
                            </button>
                            <p class="text-xs text-amber-600 font-medium">Les inscriptions sont clôturées, modification impossible.</p>
                        @endif
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
