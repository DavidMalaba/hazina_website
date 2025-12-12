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
        </style>
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-900">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-slate-200 fixed w-full z-50 transition-all duration-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-20">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="/" wire:navigate class="flex items-center gap-2">
                                    <img src="/images/logo.png" alt="Hazina Mining Hub" class="h-12 w-auto">
                                </a>
                            </div>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden sm:flex sm:items-center sm:space-x-8">
                            <a href="{{ route('home') }}" wire:navigate class="text-sm font-medium text-slate-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('home') ? 'text-emerald-600' : '' }}">
                                Accueil
                            </a>
                            
                            <!-- Dropdown About -->
                            <div class="relative group">
                                <button class="flex items-center gap-1 text-sm font-medium text-slate-600 hover:text-emerald-600 transition-colors focus:outline-none {{ request()->routeIs('about') ? 'text-emerald-600' : '' }}">
                                    À propos
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </button>
                                <div class="absolute left-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-left z-50 border border-slate-100">
                                    <a href="{{ route('about') }}" wire:navigate class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-emerald-600">Vue d'ensemble</a>
                                    <a href="{{ route('mission-vision') }}" wire:navigate class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-emerald-600">Vision & Mission</a>
                                    <a href="{{ route('solutions') }}" wire:navigate class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-emerald-600">Nos Solutions</a>
                                </div>
                            </div>

                            <a href="{{ route('programs') }}" wire:navigate class="text-sm font-medium text-slate-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('programs') ? 'text-emerald-600' : '' }}">
                                Programmes
                            </a>
                            <a href="{{ route('partners') }}" wire:navigate class="text-sm font-medium text-slate-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('partners') ? 'text-emerald-600' : '' }}">
                                Partenaires
                            </a>
                            <a href="{{ route('blog.index') }}" wire:navigate class="text-sm font-medium text-slate-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('blog.*') ? 'text-emerald-600' : '' }}">
                                Actualités
                            </a>
                            <a href="{{ route('contact') }}" wire:navigate class="px-5 py-2.5 text-sm font-medium text-slate-900 bg-emerald-600 hover:bg-emerald-700 rounded-full transition-all shadow-lg shadow-emerald-600/20">
                                Contactez-nous
                            </a>
                        </div>

                        <!-- Mobile menu button -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-slate-100">
                    <div class="pt-2 pb-3 space-y-1">
                        <a href="{{ route('home') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-600 transition">
                            Accueil
                        </a>
                        <a href="{{ route('about') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-600 transition">
                            À propos
                        </a>
                        <a href="{{ route('programs') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-600 transition">
                            Programmes
                        </a>
                        <a href="{{ route('partners') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-600 transition">
                            Partenaires
                        </a>
                        <a href="{{ route('blog.index') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-600 transition">
                            Actualités
                        </a>
                        <a href="{{ route('contact') }}" wire:navigate class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-slate-600 hover:text-emerald-600 hover:bg-slate-50 hover:border-emerald-600 transition">
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
            <footer class="bg-slate-900 text-white border-t border-slate-800">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="col-span-1 md:col-span-2">
                            <img src="/images/logo.png" alt="Hazina Mining Hub" class="h-10 w-auto mb-4 brightness-0 invert">
                            <p class="text-slate-400 text-sm leading-relaxed max-w-md">
                                Hazina Mining Hub est un pont entre le potentiel minier et les entrepreneurs locaux. Nous œuvrons pour un secteur minier inclusif, innovant et durable en RDC.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-emerald-400 tracking-wider uppercase mb-4">Navigation</h3>
                            <ul class="space-y-3">
                                <li><a href="{{ route('home') }}" wire:navigate class="text-slate-400 hover:text-white transition">Accueil</a></li>
                                <li class="relative group">
                                    <button class="flex items-center gap-1 text-slate-400 hover:text-white transition focus:outline-none">
                                        À propos
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </button>
                                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-left z-50">
                                        <a href="{{ route('about') }}" wire:navigate class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-emerald-600">Vue d'ensemble</a>
                                        <a href="{{ route('about') }}#vision" wire:navigate class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-emerald-600">Vision & Mission</a>
                                        <a href="{{ route('about') }}#solutions" wire:navigate class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-emerald-600">Nos Solutions</a>
                                    </div>
                                </li>
                                <li><a href="{{ route('programs') }}" wire:navigate class="text-slate-400 hover:text-white transition">Programmes</a></li>
                                <li><a href="{{ route('partners') }}" wire:navigate class="text-slate-400 hover:text-white transition">Partenaires</a></li>
                                <li><a href="{{ route('blog.index') }}" wire:navigate class="text-slate-400 hover:text-white transition">Actualités</a></li>
                                <li><a href="{{ route('contact') }}" wire:navigate class="text-slate-400 hover:text-white transition">Contact</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-emerald-400 tracking-wider uppercase mb-4">Contact</h3>
                            <ul class="space-y-3 text-slate-400 text-sm">
                                <li>Lubumbashi, RDC</li>
                                <li>contact@hazinamininghub.com</li>
                                <li>+243 000 000 000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-12 pt-8 border-t border-slate-800 text-center text-sm text-slate-500">
                        &copy; {{ date('Y') }} Hazina Mining Hub. Tous droits réservés.
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
