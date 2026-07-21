<div class="bg-slate-50 min-h-screen">
    @include("livewire.cohorts.register.header", ["currentStep" => 1, "cohort" => $cohort])
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="mb-8">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center shadow-sm flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-slate-900">L'Entrepreneur</h1>
                    <p class="text-slate-500 text-sm mt-0.5">Parlez-nous de vous et de votre parcours</p>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="nextStep" class="space-y-5">
            <fieldset wire:loading.attr="disabled" wire:target="nextStep" class="space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Prénom <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="first_name" placeholder="Jean-Jacques"
                            class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-slate-900 placeholder-slate-400 text-sm transition">
                        @error('first_name') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Nom <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="last_name" placeholder="Mutombo"
                            class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-slate-900 placeholder-slate-400 text-sm transition">
                        @error('last_name') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Email <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <input type="email" wire:model="email" placeholder="jean@exemple.com"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 pl-10 pr-4 text-sm transition">
                        </div>
                        @error('email') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        @if($emailExists)
                            <div class="mt-3 p-3 bg-amber-50 border border-amber-200 rounded-xl">
                                <p class="text-xs text-amber-800 mb-2">Cette adresse email est déjà utilisée. Si c'est vous, veuillez vous connecter pour continuer votre inscription. Sinon, veuillez utiliser une autre adresse email.</p>
                                <a href="{{ route('login') }}" class="inline-block text-xs font-bold text-amber-700 bg-amber-100 hover:bg-amber-200 px-3 py-1.5 rounded-lg transition">Se connecter</a>
                            </div>
                        @endif
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Téléphone <span class="text-red-500">*</span></label>
                        <div class="relative flex">
                            <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-slate-200 bg-slate-50 text-slate-500 text-sm font-semibold">
                                +243
                            </span>
                            <input type="tel" wire:model="phone" placeholder="81X XXX XXX" maxlength="9" pattern="[0-9]{9}"
                                class="w-full rounded-r-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                        </div>
                        @error('phone') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Genre <span class="text-red-500">*</span></label>
                        <select wire:model="gender" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-slate-900 text-sm transition">
                            <option value="">Sélectionner</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                        @error('gender') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Date de naissance</label>
                        <input type="date" wire:model="birthdate"
                            class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-slate-900 text-sm transition">
                        @error('birthdate') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Province de résidence <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select wire:model.live="user_province_id" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 appearance-none py-3 px-4 text-sm transition pr-10">
                                <option value="">Sélectionnez votre province</option>
                                @foreach($this->dbProvinces as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('user_province_id') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Ville de résidence <span class="text-red-500">*</span></label>
                        <input type="text" list="user_cities_list" wire:model="user_city" placeholder="ex: Kinshasa"
                            {{ empty($user_province_id) ? 'disabled' : '' }}
                            class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition disabled:bg-slate-100 disabled:cursor-not-allowed">
                        <datalist id="user_cities_list">
                            @foreach($this->availableCities as $city)
                                <option value="{{ $city->name }}">
                            @endforeach
                        </datalist>
                        @error('user_city') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">À propos de vous <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                    <textarea wire:model="bio" rows="4" placeholder="Votre parcours, vos expertises, ce qui vous définit en tant qu'entrepreneur..."
                        class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm resize-none transition"></textarea>
                </div>
            </fieldset>

            <div class="pt-6 mt-8 border-t border-slate-200 flex items-center justify-between gap-4">
                <div></div>
                <button type="submit" wire:loading.attr="disabled" wire:target="nextStep" class="flex items-center gap-2 px-8 py-3 rounded-full font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-lg shadow-emerald-600/20 disabled:opacity-70 disabled:cursor-wait">
                    <span wire:loading.class="hidden" wire:target="nextStep" class="flex items-center gap-2">
                        Suivant <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                    <span wire:loading.class.remove="hidden" wire:target="nextStep" class="hidden flex items-center gap-2">
                        <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Traitement...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
