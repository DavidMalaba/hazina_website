<div class="bg-slate-50 min-h-screen">
    <!-- Header -->
    <div class="bg-slate-900 py-24 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Contactez-nous</h1>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                Notre équipe est à votre disposition pour répondre à toutes vos questions et discuter de vos projets.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Bloc Formulaire (2/3 width on large screens) -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-slate-900 mb-2">Envoyez-nous un message</h2>
                    <p class="text-slate-600 mb-8">Remplissez le formulaire ci-dessous, nous vous répondrons dans les plus brefs délais.</p>
                    
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nom complet</label>
                                <input type="text" id="name" class="w-full rounded-xl border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                                <input type="email" id="email" class="w-full rounded-xl border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-slate-700 mb-1">Sujet</label>
                            <input type="text" id="subject" class="w-full rounded-xl border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-700 mb-1">Message</label>
                            <textarea id="message" rows="6" class="w-full rounded-xl border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition"></textarea>
                        </div>
                        <button type="submit" class="inline-flex justify-center items-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-slate-900 bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition shadow-lg shadow-emerald-600/20">
                            Envoyer le message
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bloc Informations Générales (1/3 width) -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-emerald-900 rounded-3xl p-8 text-white shadow-lg">
                    <h3 class="text-xl font-bold mb-6">Informations Directes</h3>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-emerald-800 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <div>
                                <span class="block text-emerald-200 text-sm">Email Général</span>
                                <a href="mailto:hello@hazinahub.com" class="font-medium hover:text-emerald-300 transition">hello@hazinahub.com</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-emerald-800 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </div>
                            <div>
                                <span class="block text-emerald-200 text-sm">Téléphone</span>
                                <a href="tel:+243000000000" class="font-medium hover:text-emerald-300 transition">+243841296667
</a>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Rejoignez-nous</h3>
                    <p class="text-slate-600 mb-6 text-sm">Suivez nos activités sur les réseaux sociaux.</p>
                    <div class="flex gap-4">
                        <!-- X (Twitter) -->
                        <a href="https://twitter.com/hazinahub" target="_blank" class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center text-slate-500 hover:bg-emerald-600 hover:text-white transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        
                        <!-- Facebook -->
                        <a href="https://facebook.com/share/1E7BjBojks/?mibextid=wwXIfr" target="_blank" class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center text-slate-500 hover:bg-emerald-600 hover:text-white transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://www.instagram.com/hazina_mining_hub?igsh=dHVwZ2ltcTlwYnBs&utm_source=qr" target="_blank" class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center text-slate-500 hover:bg-emerald-600 hover:text-white transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        
                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/company/naissance-mark%C3%A9ting/" target="_blank" class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center text-slate-500 hover:bg-emerald-600 hover:text-white transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nos Bureaux Section -->
        <div class="mt-24">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Nos Bureaux</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">Retrouvez-nous dans les principales villes minières et économiques du pays.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Lubumbashi -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-slate-900 transition">
                        <span class="font-bold">LUB</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Lubumbashi</h3>
                    <div class="space-y-3 text-sm text-slate-600">
                        <p class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>Avenue Kifufula numéro 20 Q/ Lido</span>
                        </p>
                    </div>
                    <a href="#" class="mt-6 inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-700">
                        Voir sur la carte
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>

                <!-- Kinshasa -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-slate-900 transition">
                        <span class="font-bold">KIN</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Kinshasa</h3>
                    <div class="space-y-3 text-sm text-slate-600">
                        <p class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>Boulevard du 30 Juin, Gombe<br>SILIKIN VILLAGE</span>
                        </p>
                    </div>
                    <a href="#" class="mt-6 inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-700">
                        Voir sur la carte
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>

                <!-- Kolwezi -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-slate-900 transition">
                        <span class="font-bold">KOL</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Kolwezi</h3>
                    <div class="space-y-3 text-sm text-slate-600">
                        <p class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>Avenue Laurent Désiré Kabila<br>Lualaba</span>
                        </p>
                    </div>
                    <a href="#" class="mt-6 inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-700">
                        Voir sur la carte
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>

                <!-- Mbuji-Mayi -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-slate-900 transition">
                        <span class="font-bold">MBU</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Mbuji-Mayi</h3>
                    <div class="space-y-3 text-sm text-slate-600">
                        <p class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>Avenue Inga, Commune de la Kanshi</span>
                        </p>
                    </div>
                    <a href="#" class="mt-6 inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-700">
                        Voir sur la carte
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
