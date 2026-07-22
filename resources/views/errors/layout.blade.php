<x-layouts.app :title="$title ?? 'Erreur'">
    <div class="min-h-[70vh] flex items-center justify-center py-20 bg-slate-50 relative overflow-hidden">
        <!-- Background Decorations -->
        <div class="absolute top-0 w-full h-80 bg-gradient-to-b from-emerald-600/5 to-transparent -z-10"></div>
        <div class="absolute top-20 right-0 -mr-20 w-72 h-72 bg-emerald-400/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-20 left-0 -ml-20 w-72 h-72 bg-emerald-600/10 rounded-full blur-3xl -z-10"></div>

        <div class="w-full max-w-2xl px-6 text-center">
            <h1 class="text-9xl font-extrabold text-emerald-600 tracking-tight drop-shadow-sm">
                @yield('code')
            </h1>
            <h2 class="mt-8 text-3xl font-bold text-slate-900 sm:text-4xl">
                @yield('message')
            </h2>
            <p class="mt-6 text-lg text-slate-600">
                @yield('description')
            </p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition-all hover:scale-105 duration-200">
                    Retour à l'accueil
                </a>
                <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center px-8 py-3 border border-slate-300 text-base font-medium rounded-xl text-slate-700 bg-white hover:bg-slate-50 hover:text-slate-900 shadow-sm transition-all duration-200">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
