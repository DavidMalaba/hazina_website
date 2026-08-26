<x-layouts.app>
    <x-slot:title>
        Gestion des abonnements
    </x-slot>

    <div class="min-h-[70vh] flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-md">
            <div>
                <h2 class="mt-2 text-center text-3xl font-extrabold text-slate-900">
                    Gérez vos préférences ⚙️
                </h2>
                <p class="mt-4 text-center text-sm text-gray-600">
                    Choisissez les canaux sur lesquels vous souhaitez recevoir nos communications.
                </p>
            </div>
            
            @if (session()->has('success'))
                <div class="mt-4 p-4 bg-emerald-50 text-emerald-700 rounded-xl border border-emerald-200 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('newsletter.unsubscribe.process', $subscriber) }}" method="POST">
                @csrf
                
                <div class="space-y-4 bg-slate-50 p-4 rounded-xl border border-slate-200">
                    <div class="flex items-center">
                        <input id="pref_email" name="channels[email]" type="checkbox" value="1" {{ $subscriber->accepts_email ? 'checked' : '' }} class="h-4 w-4 text-emerald-500 focus:ring-emerald-500 border-gray-300 rounded">
                        <label for="pref_email" class="ml-3 block text-sm font-medium text-gray-700">
                            Recevoir par E-mail
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="pref_whatsapp" name="channels[whatsapp]" type="checkbox" value="1" {{ $subscriber->accepts_whatsapp ? 'checked' : '' }} class="h-4 w-4 text-emerald-500 focus:ring-emerald-500 border-gray-300 rounded">
                        <label for="pref_whatsapp" class="ml-3 block text-sm font-medium text-gray-700">
                            Recevoir par WhatsApp
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="pref_sms" name="channels[sms]" type="checkbox" value="1" {{ $subscriber->accepts_sms ? 'checked' : '' }} class="h-4 w-4 text-emerald-500 focus:ring-emerald-500 border-gray-300 rounded">
                        <label for="pref_sms" class="ml-3 block text-sm font-medium text-gray-700">
                            Recevoir par SMS
                        </label>
                    </div>
                </div>
                
                <!-- Unsubscribe All Section -->
                <div class="border-t border-gray-200 pt-6">
                    <div class="flex items-center mb-4">
                        <input id="unsubscribe_all" name="unsubscribe_all" type="checkbox" value="1" class="h-4 w-4 text-red-500 focus:ring-red-500 border-gray-300 rounded">
                        <label for="unsubscribe_all" class="ml-3 block text-sm font-bold text-red-600">
                            Me désabonner de TOUT
                        </label>
                    </div>

                    <div id="reason_section" class="hidden space-y-4 bg-red-50 p-4 rounded-xl border border-red-100">
                        <p class="text-xs text-red-800 font-medium mb-2">Afin de nous aider à nous améliorer, pourriez-vous nous dire pourquoi ?</p>
                        <div class="flex items-center">
                            <input id="reason_frequency" name="reason" type="radio" value="Je reçois trop de messages" class="h-4 w-4 text-red-500 focus:ring-red-500 border-gray-300">
                            <label for="reason_frequency" class="ml-3 block text-sm font-medium text-gray-700">Je reçois trop de messages</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input id="reason_relevance" name="reason" type="radio" value="Le contenu ne m'intéresse plus" class="h-4 w-4 text-red-500 focus:ring-red-500 border-gray-300">
                            <label for="reason_relevance" class="ml-3 block text-sm font-medium text-gray-700">Le contenu ne m'intéresse plus</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input id="reason_spam" name="reason" type="radio" value="Je n'ai jamais demandé à être abonné" class="h-4 w-4 text-red-500 focus:ring-red-500 border-gray-300">
                            <label for="reason_spam" class="ml-3 block text-sm font-medium text-gray-700">Je n'ai jamais demandé à être abonné</label>
                        </div>
                        
                        <div class="flex items-start flex-col">
                            <div class="flex items-center mb-2">
                                <input id="reason_other" name="reason" type="radio" value="other" class="h-4 w-4 text-red-500 focus:ring-red-500 border-gray-300">
                                <label for="reason_other" class="ml-3 block text-sm font-medium text-gray-700">Autre raison</label>
                            </div>
                            
                            <div id="other_reason_container" class="w-full hidden pl-7">
                                <textarea id="other_reason" name="other_reason" rows="2" maxlength="150" class="shadow-sm focus:ring-red-500 focus:border-red-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Précisez votre raison (150 caractères max)..."></textarea>
                                <p class="mt-1 text-xs text-gray-500">Maximum 150 caractères.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    const unsubscribeAll = document.getElementById('unsubscribe_all');
                    const reasonSection = document.getElementById('reason_section');
                    const channelCheckboxes = document.querySelectorAll('input[name^="channels"]');
                    
                    const radios = document.querySelectorAll('input[name="reason"]');
                    const otherContainer = document.getElementById('other_reason_container');
                    const otherTextarea = document.getElementById('other_reason');

                    // Function to handle "Unsubscribe all" toggle manually
                    function toggleUnsubscribeAll(isChecked) {
                        if (isChecked) {
                            reasonSection.classList.remove('hidden');
                            channelCheckboxes.forEach(cb => {
                                cb.checked = false;
                            });
                            // Make reason required
                            document.getElementById('reason_frequency').required = true;
                        } else {
                            reasonSection.classList.add('hidden');
                            document.getElementById('reason_frequency').required = false;
                        }
                    }

                    // Handle "Unsubscribe all" change event
                    unsubscribeAll.addEventListener('change', function() {
                        toggleUnsubscribeAll(this.checked);
                    });

                    // Handle individual channel change events
                    channelCheckboxes.forEach(cb => {
                        cb.addEventListener('change', function() {
                            const anyChecked = Array.from(channelCheckboxes).some(c => c.checked);
                            if (!anyChecked) {
                                // If all unchecked, automatically trigger "unsubscribe all"
                                unsubscribeAll.checked = true;
                                toggleUnsubscribeAll(true);
                            } else {
                                // If at least one is checked, make sure "unsubscribe all" is unchecked
                                unsubscribeAll.checked = false;
                                toggleUnsubscribeAll(false);
                            }
                        });
                    });
                    
                    // Handle "Other" reason toggle
                    radios.forEach(radio => {
                        radio.addEventListener('change', function() {
                            if (this.value === 'other') {
                                otherContainer.classList.remove('hidden');
                                otherTextarea.required = true;
                            } else {
                                otherContainer.classList.add('hidden');
                                otherTextarea.required = false;
                                otherTextarea.value = '';
                            }
                        });
                    });
                </script>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-slate-900 bg-[#94ef1e] hover:bg-[#82d619] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#94ef1e] transition-colors">
                        Enregistrer mes préférences
                    </button>
                    <a href="{{ route('home') }}" class="mt-3 w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                        Annuler et retourner à l'accueil
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
