<div class="bg-white min-h-screen py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-slate-900 mb-4">Devenir Partenaire</h1>
            <p class="text-slate-600">
                Rejoignez l'écosystème Hazina Mining Hub et participez à la transformation du secteur minier.
            </p>
        </div>

        <div class="bg-slate-50 rounded-2xl p-8 md:p-12 shadow-sm border border-slate-100">
            @if (session()->has('success'))
                <div class="mb-8 p-4 bg-emerald-50 text-emerald-700 rounded-xl border border-emerald-200">
                    {{ session('success') }}
                </div>
            @endif
            
            <form wire:submit.prevent="submit" class="space-y-8">
                <!-- Organization Details -->
                <div>
                    <h3 class="text-lg font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2">Information sur l'organisation</h3>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="org_name" class="block text-sm font-medium text-slate-700">Nom de l'entreprise / Organisation</label>
                            <input type="text" id="org_name" wire:model="org_name" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            @error('org_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="org_type" class="block text-sm font-medium text-slate-700">Type d'organisation</label>
                                <select id="org_type" wire:model="org_type" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    <option>Entreprise Minière</option>
                                    <option>Institution Publique</option>
                                    <option>Investisseur / Banque</option>
                                    <option>ONG / Développement</option>
                                    <option>Startup / PME</option>
                                    <option>Autre</option>
                                </select>
                                @error('org_type') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="website" class="block text-sm font-medium text-slate-700">Site Web (Optionnel)</label>
                                <input type="url" id="website" wire:model="website" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                                @error('website') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Person -->
                <div>
                    <h3 class="text-lg font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2">Personne de contact</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="contact_name" class="block text-sm font-medium text-slate-700">Nom complet</label>
                            <input type="text" id="contact_name" wire:model="contact_name" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            @error('contact_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="contact_role" class="block text-sm font-medium text-slate-700">Fonction</label>
                            <input type="text" id="contact_role" wire:model="contact_role" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            @error('contact_role') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700">Email professionnel</label>
                            <input type="email" id="email" wire:model="email" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700">Téléphone</label>
                            <input type="tel" id="phone" wire:model="phone" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Partnership Interest -->
                <div>
                    <h3 class="text-lg font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2">Intérêt du partenariat</h3>
                    <div class="space-y-6">
                        <div>
                            <label for="interest" class="block text-sm font-medium text-slate-700">Domaines d'intérêt (Cochez les cases pertinentes)</label>
                            <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" wire:model="interests" value="Innovation & Recherche (Hazina Lab)" class="rounded border-slate-300 text-emerald-600 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    <span class="ml-2 text-slate-600">Innovation & Recherche (Hazina Lab)</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" wire:model="interests" value="Formation & Talents (Hazina Training)" class="rounded border-slate-300 text-emerald-600 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    <span class="ml-2 text-slate-600">Formation & Talents (Hazina Training)</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" wire:model="interests" value="Opportunités d'affaires (Hazina Connect)" class="rounded border-slate-300 text-emerald-600 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    <span class="ml-2 text-slate-600">Opportunités d'affaires (Hazina Connect)</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" wire:model="interests" value="Durabilité & RSE (Hazina Green)" class="rounded border-slate-300 text-emerald-600 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    <span class="ml-2 text-slate-600">Durabilité & RSE (Hazina Green)</span>
                                </label>
                            </div>
                            @error('interests') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-700">Message / Proposition de valeur</label>
                            <p class="text-xs text-slate-500 mb-2">Décrivez brièvement comment vous souhaitez collaborer avec nous.</p>
                            <textarea id="message" wire:model="message" rows="4" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                            @error('message') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-slate-900 bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition disabled:opacity-50" wire:loading.attr="disabled">
                        <span wire:loading.remove>Soumettre la demande</span>
                        <span wire:loading>Envoi en cours...</span>
                        <svg wire:loading.remove class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
