<div class="bg-slate-50 min-h-screen">
    @include("livewire.cohorts.register.header", ["currentStep" => 2, "cohort" => $cohort])
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="mb-8">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center shadow-sm flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-slate-900">Enchanté, {{ Auth::user()->first_name }} 👋</h1>
                    <p class="text-slate-500 text-sm mt-0.5">Maintenant, parlez-nous de votre entreprise, vos activités et votre marché</p>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="nextStep" class="space-y-5">
            <fieldset wire:loading.attr="disabled" wire:target="nextStep" class="space-y-5">
                <div class="space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Nom de l'entreprise / projet <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="company_name" placeholder="ex: TechMines Solutions"
                            class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                        @error('company_name') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Description de l'entreprise <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                        <textarea wire:model="company_description" rows="3" placeholder="Mission, proposition de valeur, activités principales..."
                            class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm resize-none transition"></textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Durée d'existence <span class="text-red-500">*</span></label>
                            <select wire:model="business_age_range" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <optgroup label="Moins d'un an">
                                    <option value="0-3mois">0 – 3 mois</option>
                                    <option value="3-6mois">3 – 6 mois</option>
                                    <option value="6-12mois">6 – 12 mois</option>
                                </optgroup>
                                <optgroup label="Années">
                                    <option value="1-2ans">1 – 2 ans</option>
                                    <option value="2-5ans">2 – 5 ans</option>
                                    <option value="5-10ans">5 – 10 ans</option>
                                    <option value="10ans+">Plus de 10 ans</option>
                                </optgroup>
                            </select>
                            @error('business_age_range') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Secteur d'activité <span class="text-red-500">*</span></label>
                            <select wire:model="industry_sector" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <option value="mines_artisanales">Mines artisanales</option>
                                <option value="mines_industrielles">Mines industrielles</option>
                                <option value="transformation_minerais">Transformation de minerais</option>
                                <option value="logistique_transport">Logistique & Transport minier</option>
                                <option value="technologie_miniere">Technologie minière / GeoTech</option>
                                <option value="commerce_negoce">Commerce & Négoce</option>
                                <option value="energie">Énergie (solaire, hydraulique…)</option>
                                <option value="agriculture">Agriculture / Agro-industrie</option>
                                <option value="sante">Santé & Bien-être</option>
                                <option value="education_formation">Éducation & Formation</option>
                                <option value="finance_fintech">Finance & Fintech</option>
                                <option value="btp_construction">BTP & Construction</option>
                                <option value="environnement">Environnement & Développement durable</option>
                                <option value="autre">Autre</option>
                            </select>
                            @error('industry_sector') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Nombre d'employés <span class="text-red-500">*</span></label>
                            <select wire:model="employee_count" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <option value="solo">Je travaille seul(e)</option>
                                <option value="2-5">2 – 5 employés</option>
                                <option value="6-10">6 – 10 employés</option>
                                <option value="11-25">11 – 25 employés</option>
                                <option value="26-50">26 – 50 employés</option>
                                <option value="50+">Plus de 50 employés</option>
                            </select>
                            @error('employee_count') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Chiffre d'affaires annuel <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                            <select wire:model="revenue_range" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <option value="0">Pas encore de revenus</option>
                                <option value="moins-5k">Moins de 5 000 $</option>
                                <option value="5k-20k">5 000 $ – 20 000 $</option>
                                <option value="20k-50k">20 000 $ – 50 000 $</option>
                                <option value="50k-100k">50 000 $ – 100 000 $</option>
                                <option value="100k-500k">100 000 $ – 500 000 $</option>
                                <option value="500k+">Plus de 500 000 $</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Clients / Partenaires actuels <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                            <select wire:model="client_count_range" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                <option value="0">Aucun pour l'instant</option>
                                <option value="1-5">1 – 5</option>
                                <option value="6-20">6 – 20</option>
                                <option value="21-50">21 – 50</option>
                                <option value="51-200">51 – 200</option>
                                <option value="200+">Plus de 200</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Email entreprise <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                            <input type="email" wire:model="company_email" placeholder="contact@entreprise.com"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                            @error('company_email') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Site web <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                            </span>
                            <input type="url" wire:model="company_website" placeholder="https://monentreprise.com"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 pl-9 pr-4 text-sm transition">
                        </div>
                        @error('company_website') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div class="bg-slate-100/80 rounded-2xl p-5 space-y-4">
                        <div class="flex items-center gap-2 text-xs font-bold text-slate-600 uppercase tracking-wider">
                            <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Localisation
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Adresse physique <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                            <input type="text" wire:model="address" placeholder="ex: Avenue du Commerce, N° 12, Gombe"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Province <span class="text-red-500">*</span></label>
                                <select wire:model.live="company_province_id" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                    <option value="">Sélectionnez la province</option>
                                    @foreach($this->dbProvinces as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_province_id') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Ville <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>
                                <input type="text" list="company_cities_list" wire:model="company_city" placeholder="ex: Kinshasa"
                                    {{ empty($company_province_id) ? 'disabled' : '' }}
                                    class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition disabled:bg-slate-100 disabled:cursor-not-allowed">
                                <datalist id="company_cities_list">
                                    @foreach($this->availableCities as $city)
                                        <option value="{{ $city->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        <div class="pt-6 mt-8 border-t border-slate-200 flex items-center justify-between gap-4">
            <button type="button" wire:click="previousStep" class="px-6 py-3 rounded-full font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">Retour</button>
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
