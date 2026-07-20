<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Hazina Mining Hub - L\'avenir minier du Congo' }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
            [data-nav].is-scrolled { box-shadow: 0 10px 30px -10px rgb(15 20 25 / 0.15); }
        </style>
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-900">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav x-data="{ open: false }" data-nav class="bg-white/70 backdrop-blur-xl border-b border-slate-200/60 fixed w-full z-50 transition-all duration-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-20">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="/" wire:navigate class="flex items-center gap-2 transition-transform hover:scale-105">
                                    <img src="/images/logo.png" alt="Hazina Mining Hub" class="h-12 w-auto">
                                </a>
                            </div>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden sm:flex sm:items-center sm:space-x-8">
                            <a href="{{ route('home') }}" wire:navigate class="group relative text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors py-2 {{ request()->routeIs('home') ? 'text-slate-900' : '' }}">
                                Accueil
                                <span class="absolute left-0 -bottom-0.5 h-0.5 rounded-full bg-gradient-to-r from-emerald-400 via-sky-500 to-violet-500 transition-all duration-300 {{ request()->routeIs('home') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>

                            <!-- Dropdown About -->
                            <div class="relative group">
                                <button class="flex items-center gap-1 text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors focus:outline-none py-2 {{ request()->routeIs('about') ? 'text-slate-900' : '' }}">
                                    À propos
                                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </button>
                                <div class="absolute left-0 mt-2 w-52 bg-white rounded-2xl shadow-xl py-2 opacity-0 invisible translate-y-1 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 transform origin-top-left z-50 border border-slate-100">
                                    <a href="{{ route('about') }}" wire:navigate class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">Vue d'ensemble</a>
                                    <a href="{{ route('mission-vision') }}" wire:navigate class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 transition-colors">Vision & Mission</a>
                                    <a href="{{ route('solutions') }}" wire:navigate class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition-colors">Nos Solutions</a>
                                </div>
                            </div>

                            <a href="{{ route('programs') }}" wire:navigate class="group relative text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors py-2 {{ request()->routeIs('programs') ? 'text-slate-900' : '' }}">
                                Programmes
                                <span class="absolute left-0 -bottom-0.5 h-0.5 rounded-full bg-gradient-to-r from-emerald-400 via-sky-500 to-violet-500 transition-all duration-300 {{ request()->routeIs('programs') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>
                            <a href="{{ route('partners') }}" wire:navigate class="group relative text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors py-2 {{ request()->routeIs('partners') ? 'text-slate-900' : '' }}">
                                Partenaires
                                <span class="absolute left-0 -bottom-0.5 h-0.5 rounded-full bg-gradient-to-r from-emerald-400 via-sky-500 to-violet-500 transition-all duration-300 {{ request()->routeIs('partners') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>
                            <a href="{{ route('blog.index') }}" wire:navigate class="group relative text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors py-2 {{ request()->routeIs('blog.*') ? 'text-slate-900' : '' }}">
                                Actualités
                                <span class="absolute left-0 -bottom-0.5 h-0.5 rounded-full bg-gradient-to-r from-emerald-400 via-sky-500 to-violet-500 transition-all duration-300 {{ request()->routeIs('blog.*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>
                            <a href="{{ route('contact') }}" wire:navigate class="px-5 py-2.5 text-sm font-semibold text-slate-900 bg-gradient-to-r from-emerald-400 to-emerald-500 hover:from-emerald-500 hover:to-emerald-600 rounded-full transition-all duration-300 shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 hover:scale-105">
                                Contactez-nous
                            </a>
                        </div>

                        <!-- Mobile menu button -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" aria-label="Menu" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="sm:hidden bg-white border-t border-slate-100" style="display: none;">
                    <div class="pt-2 pb-3 space-y-1">
                        <a href="{{ route('home') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-500 transition">
                            Accueil
                        </a>
                        <a href="{{ route('about') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-500 transition">
                            À propos
                        </a>
                        <a href="{{ route('programs') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-500 transition">
                            Programmes
                        </a>
                        <a href="{{ route('partners') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-500 transition">
                            Partenaires
                        </a>
                        <a href="{{ route('blog.index') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-500 transition">
                            Actualités
                        </a>
                        <a href="{{ route('contact') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-500 transition">
                            Contact
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="flex-grow pt-20">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="relative bg-slate-900 text-white border-t border-slate-800 overflow-hidden">
                <!-- CTA Band -->
                <div class="relative border-b border-slate-800 overflow-hidden">
                    <div class="absolute inset-0 bg-mesh opacity-30"></div>
                    <div class="absolute -top-24 -left-24 w-72 h-72 bg-emerald-500/30 rounded-full blur-3xl animate-blob"></div>
                    <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-violet-500/30 rounded-full blur-3xl animate-blob" style="animation-delay: 4s;"></div>
                    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2">Prêt à façonner l'avenir minier du Congo ?</h2>
                            <p class="text-slate-400 max-w-xl">Rejoignez le Hub en tant qu'entrepreneur ou partenaire et faites partie du mouvement.</p>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3 shrink-0">
                            <a href="{{ route('become-partner') }}" wire:navigate class="inline-flex justify-center items-center px-6 py-3 text-sm font-semibold rounded-full text-slate-900 bg-gradient-to-r from-emerald-400 to-emerald-500 hover:scale-105 transition-all shadow-lg shadow-emerald-500/30">
                                Devenir partenaire
                            </a>
                            <a href="{{ route('contact') }}" wire:navigate class="inline-flex justify-center items-center px-6 py-3 text-sm font-semibold rounded-full text-white border border-slate-600 hover:bg-white/10 hover:scale-105 transition-all">
                                Nous contacter
                            </a>
                        </div>
                    </div>
                </div>

                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-6 gap-8">
                        <div class="col-span-1 md:col-span-2">
                            <img src="/images/logo.png" alt="Hazina Mining Hub" class="h-10 w-auto mb-4 brightness-0 invert">
                            <p class="text-slate-400 text-sm leading-relaxed max-w-md">
                                Hazina Mining Hub est un pont entre le potentiel minier et les entrepreneurs locaux. Nous œuvrons pour un secteur minier inclusif, innovant et durable en RDC.
                            </p>
                            <div class="flex gap-3 mt-6 text-slate-400 text-sm">
                                <a href="https://twitter.com/hazinahub" target="_blank" class="p-2.5 rounded-full bg-slate-800 hover:bg-sky-500 hover:text-white hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="https://facebook.com/share/1E7BjBojks/?mibextid=wwXIfr" target="_blank" class="p-2.5 rounded-full bg-slate-800 hover:bg-blue-600 hover:text-white hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="https://www.instagram.com/hazina_mining_hub?igsh=dHVwZ2ltcTlwYnBs&utm_source=qr" target="_blank" class="p-2.5 rounded-full bg-slate-800 hover:bg-gradient-to-br hover:from-fuchsia-500 hover:to-amber-500 hover:text-white hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                                <a href="https://www.linkedin.com/company/naissance-mark%C3%A9ting/" target="_blank" class="p-2.5 rounded-full bg-slate-800 hover:bg-blue-700 hover:text-white hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <h3 class="text-sm font-semibold text-emerald-400 tracking-wider uppercase mb-4">Navigation</h3>
                            <ul class="space-y-3">
                                <li><a href="{{ route('home') }}" wire:navigate class="text-slate-400 hover:text-white transition">Accueil</a></li>
                                <li><a href="{{ route('about') }}" wire:navigate class="text-slate-400 hover:text-white transition">À propos</a></li>
                                <li><a href="{{ route('programs') }}" wire:navigate class="text-slate-400 hover:text-white transition">Programmes</a></li>
                                <li><a href="{{ route('partners') }}" wire:navigate class="text-slate-400 hover:text-white transition">Partenaires</a></li>
                                <li><a href="{{ route('blog.index') }}" wire:navigate class="text-slate-400 hover:text-white transition">Actualités</a></li>
                                <li><a href="{{ route('contact') }}" wire:navigate class="text-slate-400 hover:text-white transition">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-span-1">
                            <h3 class="text-sm font-semibold text-emerald-400 tracking-wider uppercase mb-4">Contact</h3>
                            <ul class="space-y-3 text-slate-400 text-sm">
                                <li>Lubumbashi, RDC</li>
                                <li><a href="mailto:hello@hazinahub.com" class="hover:text-emerald-400 transition">hello@hazinahub.com</a></li>
                                <li><a href="tel:+243841296667" class="hover:text-emerald-400 transition">+243 841 296 667</a></li>
                            </ul>
                        </div>
                        <div class="col-span-1 md:col-span-2">
                            <livewire:newsletter-form />
                        </div>
                    </div>
                    <div class="mt-12 pt-8 border-t border-slate-800 text-center text-sm text-slate-500">
                        &copy; {{ date('Y') }} Hazina Mining Hub. Tous droits réservés.
                    </div>
                </div>
            </footer>
        </div>

        <livewire:floating-cohort-widget />
    </body>
</html>
