import re

html_to_insert = """                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-2">Comment souhaitez-vous rester informé(e) ?</label>
                                <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6 bg-slate-50 p-4 rounded-xl border border-slate-200">
                                    <div class="flex items-center h-5">
                                        <input id="opt_in_email_{id_prefix}" wire:model="opt_in_email" type="checkbox" class="focus:ring-emerald-500 h-4 w-4 text-emerald-600 border-gray-300 rounded">
                                        <div class="ml-3 text-sm">
                                            <label for="opt_in_email_{id_prefix}" class="font-medium text-slate-700">Par E-mail</label>
                                        </div>
                                    </div>
                                    <div class="flex items-center h-5">
                                        <input id="opt_in_whatsapp_{id_prefix}" wire:model="opt_in_whatsapp" type="checkbox" class="focus:ring-emerald-500 h-4 w-4 text-emerald-600 border-gray-300 rounded">
                                        <div class="ml-3 text-sm">
                                            <label for="opt_in_whatsapp_{id_prefix}" class="font-medium text-slate-700">Par WhatsApp</label>
                                        </div>
                                    </div>
                                    <div class="flex items-center h-5">
                                        <input id="opt_in_sms_{id_prefix}" wire:model="opt_in_sms" type="checkbox" class="focus:ring-emerald-500 h-4 w-4 text-emerald-600 border-gray-300 rounded">
                                        <div class="ml-3 text-sm">
                                            <label for="opt_in_sms_{id_prefix}" class="font-medium text-slate-700">Par SMS</label>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-500 mt-2">Cochez les canaux sur lesquels vous souhaitez recevoir nos actualités et annonces. (Assurez-vous de fournir un numéro de téléphone pour WhatsApp/SMS).</p>
                            </div>"""

def replace_in_file(filepath, id_prefix, start_str, end_str):
    with open(filepath, 'r') as f:
        content = f.read()
        
    start_idx = content.find(start_str)
    if start_idx == -1: return
    
    end_idx = content.find(end_str, start_idx)
    if end_idx == -1: return
    end_idx += len(end_str)
    
    new_content = content[:start_idx] + html_to_insert.replace("{id_prefix}", id_prefix) + content[end_idx:]
    
    with open(filepath, 'w') as f:
        f.write(new_content)


replace_in_file(
    'resources/views/livewire/contact.blade.php', 
    'contact',
    '<div class="col-span-1 md:col-span-2 relative flex items-start">',
    '</div>\n                            </div>'
)

replace_in_file(
    'resources/views/livewire/become-partner.blade.php', 
    'partner',
    '<div class="col-span-1 md:col-span-2 relative flex items-start mt-2">',
    '</div>\n                            </div>'
)

replace_in_file(
    'resources/views/livewire/cohorts/register/step1.blade.php', 
    'cohort',
    '<div class="col-span-1 md:col-span-2 relative flex items-start mt-2">',
    '</div>\n                        </div>'
)

