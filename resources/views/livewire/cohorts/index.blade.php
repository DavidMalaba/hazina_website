<div class="bg-slate-50 min-h-screen py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-slate-900 mb-4">Nos Cohortes</h1>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                Rejoignez nos programmes d'incubation et d'accélération. Deux sessions par an pour transformer vos projets.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($cohorts as $cohort)
                <a href="{{ route('cohorts.show', $cohort) }}" wire:navigate class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition flex flex-col h-full">
                    <div class="aspect-video bg-slate-200 relative overflow-hidden">
                        @if($cohort->image)
                            <img src="{{ asset('storage/' . $cohort->image) }}" alt="{{ $cohort->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @endif
                        <div class="absolute top-4 left-4">
                            @if($cohort->status === 'open')
                                <span class="bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-full">Inscriptions Ouvertes</span>
                            @elseif($cohort->status === 'upcoming')
                                <span class="bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full">À venir</span>
                            @elseif($cohort->status === 'closed')
                                <span class="bg-slate-500 text-white text-xs font-bold px-3 py-1 rounded-full">Fermé</span>
                            @else
                                <span class="bg-slate-800 text-white text-xs font-bold px-3 py-1 rounded-full">Terminé</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h2 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition">
                            {{ $cohort->name }}
                        </h2>
                        <div class="text-sm text-slate-500 mb-4 flex items-center gap-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                {{ $cohort->start_date->format('M Y') }} - {{ $cohort->end_date->format('M Y') }}
                            </span>
                        </div>
                        <p class="text-slate-600 line-clamp-3 mb-6 flex-grow">
                            {{ Str::limit(html_entity_decode(strip_tags($cohort->description)), 150) }}
                        </p>
                        <div class="mt-auto flex items-center text-emerald-600 font-medium">
                            Voir le programme
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
