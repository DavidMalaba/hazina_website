<div class="bg-white min-h-screen py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-slate-900 mb-4">Nos Partenaires</h1>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                Ils nous font confiance et contribuent à bâtir un écosystème minier fort.
            </p>
        </div>

        <div class="space-y-16">
            <!-- Institutions Publiques -->
            <div>
                <h2 class="text-2xl font-bold text-slate-900 mb-8 border-l-4 border-emerald-500 pl-4">Institutions Publiques</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Ministère des Mines</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">ARSP</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Camine</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Gouvernement Provincial</span>
                    </div>
                </div>
            </div>

            <!-- Entreprises Minières -->
            <div>
                <h2 class="text-2xl font-bold text-slate-900 mb-8 border-l-4 border-emerald-500 pl-4">Entreprises Minières</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Glencore</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">TFM</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Kamoa</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">KCC</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Gecamine</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Barrick</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">MMG</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Ivanhoe</span>
                    </div>
                </div>
            </div>

            <!-- Écosystème & Finance -->
            <div>
                <h2 class="text-2xl font-bold text-slate-900 mb-8 border-l-4 border-emerald-500 pl-4">Écosystème & Finance</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Silikin</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">EquityBCDC</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Rawbank</span>
                    </div>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        <span class="text-xl font-bold text-slate-400">Enabel</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-20 bg-emerald-900 rounded-3xl p-12 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Devenir Partenaire</h2>
            <p class="text-emerald-100 mb-8 max-w-2xl mx-auto">
                Vous souhaitez rejoindre notre réseau et contribuer au développement du secteur minier congolais ?
            </p>
            <a href="{{ route('become-partner') }}" wire:navigate class="inline-flex justify-center items-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-emerald-900 bg-white hover:bg-emerald-50 transition">
                Devenir Partenaire
            </a>
        </div>
    </div>
</div>
