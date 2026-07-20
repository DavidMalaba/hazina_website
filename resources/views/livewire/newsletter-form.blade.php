<div class="bg-slate-800 rounded-3xl p-6 md:p-8 mt-8 border border-slate-700">
    <h3 class="text-xl font-bold text-white mb-2">Restez informé</h3>
    <p class="text-sm text-slate-400 mb-6">Inscrivez-vous à notre newsletter pour recevoir nos dernières actualités par email et WhatsApp.</p>

    @if (session()->has('success'))
        <div class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-xl p-4 mb-6 text-sm font-medium flex items-start gap-3">
            <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ session('success') }}
        </div>
    @else
        <form wire:submit.prevent="subscribe" class="space-y-4">
            <div>
                <label for="newsletter-name" class="sr-only">Nom complet</label>
                <input wire:model="name" type="text" id="newsletter-name" placeholder="Votre nom complet" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:border-emerald-500 focus:ring-emerald-500 text-sm transition">
                @error('name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label for="newsletter-email" class="sr-only">Email</label>
                <input wire:model="email" type="email" id="newsletter-email" placeholder="Votre adresse email" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:border-emerald-500 focus:ring-emerald-500 text-sm transition">
                @error('email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="newsletter-phone" class="sr-only">Numéro WhatsApp (Optionnel)</label>
                <div class="relative flex">
                    <div class="flex items-center justify-center bg-slate-800 border border-slate-700 border-r-0 rounded-l-xl px-3 text-slate-400 text-sm">
                        <span class="mr-1">🇨🇩</span> +243
                    </div>
                    <input wire:model="phone" type="tel" id="newsletter-phone" placeholder="WhatsApp (Optionnel)" class="w-full bg-slate-900 border border-slate-700 rounded-r-xl px-4 py-3 text-white placeholder-slate-500 focus:border-emerald-500 focus:ring-emerald-500 text-sm transition">
                </div>
                @error('phone') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-start">
                <div class="flex h-5 items-center">
                    <input id="is_phone_also" wire:model="is_phone_also" type="checkbox" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-emerald-600 focus:ring-emerald-500 focus:ring-offset-slate-900 transition">
                </div>
                <div class="ml-2 text-xs">
                    <label for="is_phone_also" class="font-medium text-slate-400 cursor-pointer">Ce numéro est aussi mon numéro d'appel</label>
                </div>
            </div>

            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-medium text-sm rounded-xl px-4 py-3 transition shadow-lg shadow-emerald-500/20 flex justify-center items-center gap-2" wire:loading.attr="disabled">
                <span wire:loading.remove>S'abonner</span>
                <span wire:loading>Envoi...</span>
                <svg wire:loading.remove class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </form>
    @endif
</div>
