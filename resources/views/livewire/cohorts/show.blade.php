<div class="bg-white min-h-screen py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('cohorts.index') }}" wire:navigate class="text-slate-500 hover:text-emerald-600 transition flex items-center gap-2 mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Retour aux cohortes
            </a>
            
            <div class="flex items-center gap-4 mb-4">
                @if($cohort->status === 'open')
                    <span class="bg-emerald-100 text-emerald-800 text-sm font-bold px-3 py-1 rounded-full">Inscriptions Ouvertes</span>
                @elseif($cohort->status === 'upcoming')
                    <span class="bg-blue-100 text-blue-800 text-sm font-bold px-3 py-1 rounded-full">À venir</span>
                @elseif($cohort->status === 'closed')
                    <span class="bg-slate-100 text-slate-800 text-sm font-bold px-3 py-1 rounded-full">Fermé</span>
                @else
                    <span class="bg-slate-800 text-white text-sm font-bold px-3 py-1 rounded-full">Terminé</span>
                @endif
                <span class="text-slate-500 text-sm font-medium">
                    {{ $cohort->start_date->format('d M Y') }} - {{ $cohort->end_date->format('d M Y') }}
                </span>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 leading-tight">
                {{ $cohort->name }}
            </h1>
        </div>

        @if($cohort->image)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ $cohort->image }}" alt="{{ $cohort->name }}" class="w-full h-auto">
            </div>
        @endif

        <div class="prose prose-lg prose-slate prose-headings:text-slate-900 prose-a:text-emerald-600 hover:prose-a:text-emerald-500 mb-16">
            {!! nl2br(e($cohort->description)) !!}
        </div>

        @if($cohort->status === 'open')
            <div class="bg-slate-50 rounded-2xl p-8 md:p-12 shadow-sm border border-slate-100" id="registration-form">
                <h2 class="text-2xl font-bold text-slate-900 mb-2">Postuler à cette cohorte</h2>
                <p class="text-slate-600 mb-8">Remplissez le formulaire ci-dessous pour soumettre votre candidature.</p>

                @if(session()->has('message'))
                    <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif

                <form wire:submit="register" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-700">Nom complet</label>
                            <input type="text" id="name" wire:model="name" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                            <input type="email" id="email" wire:model="email" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700">Téléphone</label>
                        <input type="tel" id="phone" wire:model="phone" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="project_description" class="block text-sm font-medium text-slate-700">Description du projet</label>
                        <p class="text-xs text-slate-500 mb-2">Décrivez votre projet, son stade d'avancement et vos attentes vis-à-vis de la cohorte.</p>
                        <textarea id="project_description" wire:model="project_description" rows="6" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                        @error('project_description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-slate-900 bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition disabled:opacity-50 disabled:cursor-not-allowed">
                        <span wire:loading.remove>Soumettre ma candidature</span>
                        <span wire:loading>Traitement en cours...</span>
                    </button>
                </form>
            </div>
        @elseif($cohort->status === 'upcoming')
            <div class="bg-blue-50 rounded-2xl p-8 text-center border border-blue-100">
                <h2 class="text-xl font-bold text-blue-900 mb-2">Inscriptions bientôt ouvertes</h2>
                <p class="text-blue-700">Les candidatures pour cette cohorte ouvriront prochainement. Restez connectés !</p>
            </div>
        @else
            <div class="bg-slate-100 rounded-2xl p-8 text-center border border-slate-200">
                <h2 class="text-xl font-bold text-slate-900 mb-2">Inscriptions fermées</h2>
                <p class="text-slate-600">Les candidatures pour cette cohorte sont closes.</p>
            </div>
        @endif
    </div>
</div>
