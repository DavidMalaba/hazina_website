<x-layouts.app title="Connexion - Hazina Mining Hub">
    <div class="min-h-[calc(100vh-100px)] flex flex-col justify-center items-center py-16 relative overflow-hidden">
        <!-- Background Decorations -->
        <div class="absolute top-0 w-full h-80 bg-gradient-to-b from-emerald-600/5 to-transparent -z-10"></div>
        <div class="absolute top-20 right-0 -mr-20 w-72 h-72 bg-emerald-400/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-20 left-0 -ml-20 w-72 h-72 bg-emerald-600/10 rounded-full blur-3xl -z-10"></div>

        <div class="w-full sm:max-w-md px-8 py-10 bg-white/80 backdrop-blur-xl shadow-2xl shadow-slate-900/5 sm:rounded-3xl border border-slate-100 relative z-10">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-slate-900 mb-2">Espace Entrepreneur</h2>
                <p class="text-sm text-slate-500">Gérez votre profil et suivez vos candidatures</p>
            </div>

            {{ $slot }}
        </div>
    </div>
</x-layouts.app>
