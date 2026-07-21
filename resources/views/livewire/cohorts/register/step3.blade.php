<div class="bg-slate-50 min-h-screen">
    @include("livewire.cohorts.register.header", ["currentStep" => 3, "cohort" => $cohort])
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="mb-8">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center shadow-sm flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-slate-900">Documents de {{ $company_name ?: 'votre entreprise' }}</h1>
                    <p class="text-slate-500 text-sm mt-0.5">Parfait {{ Auth::user()->first_name }}, attestons maintenant la formalisation de votre entreprise</p>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="nextStep" class="space-y-5">
            <fieldset wire:loading.attr="disabled" wire:target="nextStep" class="space-y-5">
                <div class="flex items-start gap-3 bg-amber-50 border border-amber-200 rounded-2xl p-4">
                    <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="text-sm text-amber-800">L'upload de documents n'est <strong>pas obligatoire</strong>. Vous pourrez compléter votre dossier depuis votre espace entrepreneur ultérieurement.</p>
                </div>

                <label class="flex items-start gap-3 cursor-pointer p-4 rounded-2xl border-2 transition-all duration-200 {{ $has_legal_documents ? 'border-emerald-500 bg-emerald-50' : 'border-slate-200 bg-white hover:border-slate-300' }}">
                    <div class="w-5 h-5 rounded-md border-2 transition-all flex items-center justify-center flex-shrink-0 mt-0.5 {{ $has_legal_documents ? 'bg-emerald-500 border-emerald-500' : 'bg-white border-slate-300' }}">
                        <input type="checkbox" wire:model.live="has_legal_documents" class="sr-only">
                        @if($has_legal_documents)
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        @endif
                    </div>
                    <div>
                        <div class="font-semibold text-slate-900 text-sm">Mon entreprise est formellement enregistrée</div>
                        <div class="text-slate-500 text-xs mt-0.5">Je possède au moins un document légal (ID NAT, RCCM ou NIF).</div>
                    </div>
                </label>

                @if($has_legal_documents)
                    <div class="space-y-4">
                        @php
                            $docs = [
                                ['field_num' => 'id_nat', 'field_file' => 'id_nat_file', 'input_id' => 'id_nat_file_input',
                                 'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"/>',
                                 'color' => 'blue', 'label' => 'Identification Nationale (ID NAT)', 'sub' => 'Numéro et document officiel', 'placeholder' => 'ex: CD-KIN-2024-XXXXXX'],
                                ['field_num' => 'rccm', 'field_file' => 'rccm_file', 'input_id' => 'rccm_file_input',
                                 'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>',
                                 'color' => 'purple', 'label' => 'Registre de Commerce (RCCM)', 'sub' => "Numéro d'immatriculation", 'placeholder' => 'ex: CD/KIN/RCCM/24-B-XXXXX'],
                                ['field_num' => 'tax_id', 'field_file' => 'tax_id_file', 'input_id' => 'tax_id_file_input',
                                 'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>',
                                 'color' => 'emerald', 'label' => "Numéro d'Impôt (NIF)", 'sub' => "Numéro d'identification fiscale", 'placeholder' => 'ex: A2413XXXXX'],
                            ];
                            $colorMap = ['blue' => 'bg-blue-100 text-blue-600', 'purple' => 'bg-purple-100 text-purple-600', 'emerald' => 'bg-emerald-100 text-emerald-600'];
                        @endphp
                        @foreach($docs as $doc)
                            <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center {{ $colorMap[$doc['color']] }}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $doc['svg'] !!}</svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-slate-900 text-sm">{{ $doc['label'] }}</h3>
                                        <p class="text-xs text-slate-500">{{ $doc['sub'] }}</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <input type="text" wire:model="{{ $doc['field_num'] }}" placeholder="{{ $doc['placeholder'] }}"
                                            class="w-full rounded-xl border-slate-200 bg-slate-50 focus:bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-2.5 px-4 text-sm transition">
                                    </div>
                                    <div>
                                        <div class="relative">
                                            <input type="file" id="{{ $doc['input_id'] }}" wire:model="{{ $doc['field_file'] }}" class="hidden" accept=".pdf,.jpg,.jpeg,.png">
                                            <label for="{{ $doc['input_id'] }}" class="cursor-pointer flex items-center justify-center w-full rounded-xl border border-dashed border-slate-300 hover:border-emerald-400 bg-slate-50 hover:bg-emerald-50 py-2.5 px-4 text-sm font-medium text-slate-600 transition gap-2">
                                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                                Joindre le fichier
                                            </label>
                                        </div>
                                        @if(${$doc['field_file']})
                                            <div class="mt-2 flex items-center gap-2 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-100">
                                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <span class="text-xs font-semibold text-emerald-800 truncate flex-1">Fichier prêt à l'envoi</span>
                                                <button type="button" wire:click="clearFile('{{ $doc['field_file'] }}')" class="text-emerald-600 hover:text-emerald-900">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                                </button>
                                            </div>
                                        @endif
                                        @error($doc['field_file']) <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm mt-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center bg-indigo-100 text-indigo-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm">Brochure / Profil de l'entreprise <span class="text-slate-400 font-normal">(Optionnel)</span></h3>
                            <p class="text-xs text-slate-500">Un PDF ou une présentation de vos activités</p>
                        </div>
                    </div>
                    <div class="relative">
                        <input type="file" id="brochure_input" wire:model="company_brochure" class="hidden" accept=".pdf,.ppt,.pptx">
                        <label for="brochure_input" class="cursor-pointer flex items-center justify-center w-full rounded-xl border border-dashed border-slate-300 hover:border-indigo-400 bg-slate-50 hover:bg-indigo-50 py-3 px-4 text-sm font-medium text-slate-600 transition gap-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                            Joindre le profil (PDF, PPT)
                        </label>
                    </div>
                    @if($company_brochure)
                        <div class="mt-2 flex items-center gap-2 bg-indigo-50 px-3 py-1.5 rounded-lg border border-indigo-100">
                            <svg class="w-3.5 h-3.5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-xs font-semibold text-indigo-800 truncate flex-1">Fichier prêt à l'envoi</span>
                            <button type="button" wire:click="clearFile('company_brochure')" class="text-indigo-600 hover:text-indigo-900">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    @endif
                    @error('company_brochure') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
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
