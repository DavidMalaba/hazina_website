<div class="min-h-screen bg-slate-50 pt-28 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-black text-slate-900">Mon Profil</h1>
            <p class="text-slate-500 mt-2">Gérez vos informations personnelles et vos coordonnées.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-8">
                
                @if (session()->has('success'))
                    <div class="mb-6 rounded-xl bg-emerald-50 p-4 border border-emerald-100 flex items-start gap-3">
                        <svg class="h-5 w-5 text-emerald-400 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                    </div>
                @endif

                <form wire:submit.prevent="updateProfile" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Prénom</label>
                            <input type="text" wire:model="first_name" class="w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition" required>
                            @error('first_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nom</label>
                            <input type="text" wire:model="last_name" class="w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition" required>
                            @error('last_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Adresse Email</label>
                            <input type="email" wire:model="email" class="w-full rounded-xl border-slate-200 bg-slate-100 text-slate-500 cursor-not-allowed shadow-sm py-3 px-4 text-sm" disabled>
                            <p class="text-xs text-slate-400 mt-1">L'adresse email ne peut pas être modifiée car elle vous sert d'identifiant.</p>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Téléphone</label>
                            <input type="text" wire:model="phone" class="w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">À propos de vous (Bio)</label>
                        <textarea wire:model="bio" rows="4" class="w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm resize-none transition"></textarea>
                        @error('bio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex justify-end">
                        <button type="submit" wire:loading.attr="disabled" class="inline-flex justify-center py-3 px-8 border border-transparent rounded-full shadow-lg shadow-emerald-600/20 text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none transition disabled:opacity-70">
                            <span wire:loading.remove>Enregistrer les modifications</span>
                            <span wire:loading class="flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                Enregistrement...
                            </span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
