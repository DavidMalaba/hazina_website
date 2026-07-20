<div>
    <!-- Hero Section -->
    <div data-hero data-parallax-section class="relative bg-slate-900">
        <div class="absolute inset-0 overflow-hidden">
            <img src="/images/miner-sunset.jpg" alt="Mining Background" class="w-full h-full object-cover opacity-25">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/85 to-slate-900/40"></div>
            <div class="absolute inset-0 bg-mesh opacity-60"></div>

            <!-- Floating color blobs -->
            <div data-parallax="0.4" class="absolute top-0 -right-20 w-96 h-96 bg-violet-500/30 rounded-full blur-3xl animate-blob"></div>
            <div data-parallax="0.25" class="absolute bottom-0 left-10 w-80 h-80 bg-emerald-400/30 rounded-full blur-3xl animate-blob" style="animation-delay: 3s;"></div>
            <div data-parallax="0.55" class="absolute top-1/3 left-1/2 w-64 h-64 bg-amber-500/20 rounded-full blur-3xl animate-blob" style="animation-delay: 6s;"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-32 md:pt-32 md:pb-44">
            <div class="md:w-2/3">
                <span data-hero-item class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 text-emerald-300 text-sm font-medium mb-6 backdrop-blur-sm">
                    🇨🇩 Hub minier nouvelle génération
                </span>
                <h1 data-hero-item class="text-4xl md:text-6xl font-bold text-white tracking-tight mb-6">
                    L'avenir minier et industriel du <span class="text-gradient animate-gradient">Congo</span> commence ici !
                </h1>
                <p data-hero-item class="text-lg md:text-xl text-slate-300 mb-8 leading-relaxed max-w-2xl">
                    Nous plaçons les entrepreneurs congolais au cœur de l’écosystème minier.
                </p>
                <div data-hero-item class="flex flex-col sm:flex-row gap-4">
                    <a href="/contact" wire:navigate class="inline-flex justify-center items-center px-8 py-3 border border-transparent text-base font-semibold rounded-full text-slate-900 bg-gradient-to-r from-emerald-400 to-emerald-500 hover:scale-105 transition-all duration-300 shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50">
                        Rejoignez le Hub
                    </a>
                    <a href="/about" wire:navigate class="inline-flex justify-center items-center px-8 py-3 border border-slate-600 text-base font-medium rounded-full text-white hover:bg-white/10 hover:scale-105 transition-all duration-300">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats band -->
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mb-20 md:-mb-24">
            <div data-reveal="zoom-in" class="grid grid-cols-1 sm:grid-cols-3 gap-px rounded-3xl overflow-hidden bg-white/10 border border-white/10 backdrop-blur-xl shadow-2xl">
                <div class="bg-slate-900/60 p-8 text-center">
                    <div class="text-4xl font-bold text-gradient"><span data-counter="{{ $stats['entrepreneurs'] }}">0</span>+</div>
                    <div class="text-slate-300 text-sm mt-2">Entrepreneurs accompagnés</div>
                </div>
                <div class="bg-slate-900/60 p-8 text-center">
                    <div class="text-4xl font-bold text-gradient"><span data-counter="{{ $stats['cohorts'] }}">0</span></div>
                    <div class="text-slate-300 text-sm mt-2">Cohortes lancées</div>
                </div>
                <div class="bg-slate-900/60 p-8 text-center">
                    <div class="text-4xl font-bold text-gradient"><span data-counter="{{ $stats['partners'] }}">0</span>+</div>
                    <div class="text-slate-300 text-sm mt-2">Partenaires stratégiques</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="pt-32 md:pt-40 pb-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div data-reveal="fade-right" class="relative">
                    <div class="absolute -top-6 -left-6 w-32 h-32 bg-gradient-to-br from-emerald-300 to-sky-400 rounded-full opacity-40 blur-2xl animate-blob"></div>
                    <div class="absolute -bottom-6 -right-6 w-28 h-28 bg-gradient-to-br from-violet-400 to-fuchsia-400 rounded-full opacity-30 blur-2xl animate-blob" style="animation-delay: 4s;"></div>
                    <div class="relative rounded-2xl overflow-hidden shadow-xl border border-slate-100 group">
                        <img src="/images/vision-v2.jpg" alt="Vision Hazina" class="w-full h-auto transform group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent flex items-end p-8">
                            <h2 class="text-2xl font-bold text-white mb-2">Notre Vision</h2>
                        </div>
                    </div>
                </div>
                <div data-reveal="fade-left">
                    <h2 class="text-3xl font-bold text-slate-900 mb-6">Démocratiser l'accès au secteur minier</h2>
                    <p class="text-lg text-slate-600 mb-6">
                        Notre mission est de renforcer les capacités locales à travers la collaboration, la formation, l'accompagnement et l'innovation.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="shrink-0 w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            </span>
                            <span class="text-slate-700">Créer des passerelles entre acteurs institutionnels et locaux.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="shrink-0 w-6 h-6 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            </span>
                            <span class="text-slate-700">Développer les compétences techniques et entrepreneuriales.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="shrink-0 w-6 h-6 rounded-full bg-violet-100 text-violet-600 flex items-center justify-center mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            </span>
                            <span class="text-slate-700">Soutenir l'émergence de projets miniers à forte valeur ajoutée.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Pillars Section -->
    <div class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-reveal="fade-up" class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Nos Piliers d'Intervention</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                    Une approche holistique pour transformer le secteur minier congolais.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div data-reveal="fade-up" data-reveal-group="pillars" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl hover:shadow-blue-500/10 hover:-translate-y-1 transition-all duration-300 border border-slate-100 group">
                    <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 group-hover:bg-blue-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Chaîne de valeur</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Intégration stratégique des entreprises congolaises par la sous-traitance et la création d'entreprises spécialisées.
                    </p>
                </div>

                <!-- Card 2 -->
                <div data-reveal="fade-up" data-reveal-group="pillars" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl hover:shadow-purple-500/10 hover:-translate-y-1 transition-all duration-300 border border-slate-100 group">
                    <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600 mb-6 group-hover:scale-110 group-hover:bg-purple-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Innovation & Tech</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Développement de solutions technologiques adaptées : traçabilité, automatisation et optimisation logistique.
                    </p>
                </div>

                <!-- Card 3 -->
                <div data-reveal="fade-up" data-reveal-group="pillars" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1 transition-all duration-300 border border-slate-100 group">
                    <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 mb-6 group-hover:scale-110 group-hover:bg-orange-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Formation</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Renforcement des compétences techniques, managériales et entrepreneuriales pour une nouvelle génération d'acteurs.
                    </p>
                </div>

                <!-- Card 4 -->
                <div data-reveal="fade-up" data-reveal-group="pillars" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl hover:shadow-emerald-500/10 hover:-translate-y-1 transition-all duration-300 border border-slate-100 group">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-6 group-hover:scale-110 group-hover:bg-emerald-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Business</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Accompagnement stratégique : plan d'affaires, conformité, financement et stratégie commerciale.
                    </p>
                </div>

                <!-- Card 5 -->
                <div data-reveal="fade-up" data-reveal-group="pillars" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl hover:shadow-teal-500/10 hover:-translate-y-1 transition-all duration-300 border border-slate-100 group">
                    <div class="w-12 h-12 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600 mb-6 group-hover:scale-110 group-hover:bg-teal-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Durabilité</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Promotion d'un modèle minier responsable, inclusif et respectueux de l'environnement et des communautés.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Poles d'Actions -->
    <div class="relative py-20 bg-slate-900 text-white overflow-hidden">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-violet-500/10 rounded-full blur-3xl animate-blob" style="animation-delay: 5s;"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-reveal="fade-up" class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Nos Pôles d'Action</h2>
                <p class="text-slate-400 max-w-2xl mx-auto">
                    Des structures dédiées pour transformer les idées en initiatives concrètes.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div data-reveal="fade-up" data-reveal-group="poles" class="bg-slate-800 p-6 rounded-xl border border-slate-700 hover:border-emerald-500 hover:shadow-lg hover:shadow-emerald-500/10 hover:-translate-y-1 transition-all duration-300 group">
                    <h3 class="text-xl font-bold text-emerald-400 mb-2 group-hover:text-emerald-300">Hazina Lab</h3>
                    <p class="text-slate-400 text-sm">Espace d'expérimentation et d'innovation pour solutions minières.</p>
                </div>
                <div data-reveal="fade-up" data-reveal-group="poles" class="bg-slate-800 p-6 rounded-xl border border-slate-700 hover:border-sky-500 hover:shadow-lg hover:shadow-sky-500/10 hover:-translate-y-1 transition-all duration-300 group">
                    <h3 class="text-xl font-bold text-sky-400 mb-2 group-hover:text-sky-300">Hazina Training</h3>
                    <p class="text-slate-400 text-sm">Plateforme de renforcement des compétences techniques et managériales.</p>
                </div>
                <div data-reveal="fade-up" data-reveal-group="poles" class="bg-slate-800 p-6 rounded-xl border border-slate-700 hover:border-violet-500 hover:shadow-lg hover:shadow-violet-500/10 hover:-translate-y-1 transition-all duration-300 group">
                    <h3 class="text-xl font-bold text-violet-400 mb-2 group-hover:text-violet-300">Hazina Connect</h3>
                    <p class="text-slate-400 text-sm">Réseau de partenariats stratégiques et opportunités d'affaires.</p>
                </div>
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700 hover:border-emerald-500 transition group">
                    <h3 class="text-xl font-bold text-emerald-400 mb-2 group-hover:text-emerald-300">Hazina Green</h3>
                    <p class="text-slate-400 text-sm">Programme d'actions éco-responsables pour une mine durable.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Cohorts Preview -->
    <div class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-reveal="fade-up" class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Nos Prochaines Cohortes</h2>
                <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                    Ne manquez pas l'opportunité de rejoindre nos programmes d'accélération.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($upcomingCohorts as $cohort)
                    <a href="{{ route('cohorts.show', $cohort) }}" wire:navigate data-reveal="fade-up" data-reveal-group="cohorts" class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl hover:shadow-emerald-500/10 hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                        <div class="aspect-video bg-slate-200 relative overflow-hidden">
                            @if($cohort->image)
                                <img src="{{ asset('storage/' . $cohort->image) }}" alt="{{ $cohort->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @endif
                            <div class="absolute top-4 left-4">
                                @if($cohort->status === 'open')
                                    <span class="bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg shadow-emerald-500/40">Ouvert</span>
                                @else
                                    <span class="bg-sky-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg shadow-sky-500/40">À venir</span>
                                @endif
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-emerald-600 transition">{{ $cohort->name }}</h3>
                            <p class="text-slate-500 text-sm mb-4">
                                {{ $cohort->start_date->format('M Y') }} - {{ $cohort->end_date->format('M Y') }}
                            </p>
                            <div class="mt-auto text-emerald-600 font-medium text-sm flex items-center">
                                En savoir plus
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('cohorts.index') }}" wire:navigate class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 shadow-sm text-base font-medium rounded-full text-slate-700 bg-white hover:bg-slate-50 hover:scale-105 transition-all duration-300">
                    Voir toutes les cohortes
                </a>
            </div>
        </div>
    </div>

    <!-- Latest News -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-reveal="fade-up" class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Dernières Actualités</h2>
                    <p class="text-slate-600">Restez informé des activités du Hub et du secteur.</p>
                </div>
                <a href="{{ route('blog.index') }}" wire:navigate class="hidden md:flex items-center text-emerald-600 font-medium hover:text-emerald-700 transition">
                    Voir tout le blog
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                    <a href="{{ route('blog.show', $post) }}" wire:navigate data-reveal="fade-up" data-reveal-group="news" class="group block">
                        <div class="aspect-video bg-slate-100 rounded-2xl overflow-hidden mb-4">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @endif
                        </div>
                        <div class="text-sm text-slate-500 mb-2">{{ $post->published_at->format('d M Y') }}</div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-emerald-600 transition line-clamp-2">{{ $post->title }}</h3>
                        <p class="text-slate-600 line-clamp-2 text-sm">{{ strip_tags($post->content) }}</p>
                    </a>
                @endforeach
            </div>

            <div class="mt-8 md:hidden text-center">
                <a href="{{ route('blog.index') }}" wire:navigate class="text-emerald-600 font-medium hover:text-emerald-700 transition">
                    Voir tout le blog
                </a>
            </div>
        </div>
    </div>

    <!-- Partners Preview -->
    <div class="py-20 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 data-reveal="fade-up" class="text-3xl font-bold text-slate-900 mb-12">Ils nous font confiance</h2>

            <div data-reveal="zoom-in" class="flex flex-wrap justify-center gap-6 md:gap-10">
                @foreach($topPartners as $partner)
                    <div class="flex items-center justify-center h-20 w-40 bg-white rounded-xl border border-slate-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 px-4">
                        @if($partner->logo)
                            <img src="{{ asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}" class="max-h-10 object-contain grayscale hover:grayscale-0 transition duration-300">
                        @else
                            <span class="text-lg font-bold text-slate-400 hover:text-emerald-600 transition">{{ $partner->name }}</span>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                <a href="{{ route('partners') }}" wire:navigate class="text-emerald-600 font-medium hover:text-emerald-700 transition flex items-center justify-center gap-2 group">
                    Voir tous nos partenaires
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>
    </div>
</div>
