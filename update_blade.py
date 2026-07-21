import re

with open('resources/views/livewire/cohorts/register.blade.php', 'r') as f:
    content = f.read()

# 1. Update email block to include Magic Link
email_block = """                            @error('email') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                            @if($emailExists)
                                <div class="mt-3 p-3 bg-amber-50 border border-amber-200 rounded-xl">
                                    <p class="text-xs text-amber-800 mb-2">Cette adresse email est déjà utilisée. Cliquez ici pour recevoir un lien magique afin de reprendre votre inscription. Si ce n'est pas votre adresse ou si vous n'y avez plus accès, veuillez utiliser une autre adresse email.</p>
                                    <button type="button" wire:click="sendMagicLink" class="text-xs font-bold text-amber-700 bg-amber-100 hover:bg-amber-200 px-3 py-1.5 rounded-lg transition">Recevoir mon lien magique</button>
                                    @if(session()->has('magic_link_sent'))
                                        <p class="text-xs text-emerald-600 mt-2 font-semibold">{{ session('magic_link_sent') }}</p>
                                    @endif
                                </div>
                            @endif"""

content = content.replace("                            @error('email') <p class=\"text-red-500 text-xs mt-1.5\">{{ $message }}</p> @enderror", email_block)


# 2. Add Location to Step 1
location_step1 = """                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Province de résidence <span class="text-red-500">*</span></label>
                            <select wire:model="user_province_id" class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                                <option value="">— Sélectionner —</option>
                                @foreach($dbProvinces as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                @endforeach
                            </select>
                            @error('user_province_id') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Ville de résidence <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="user_city" placeholder="ex: Kinshasa"
                                class="w-full rounded-xl border-slate-200 bg-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-3 px-4 text-sm transition">
                            @error('user_city') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">À propos de vous <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>"""

content = content.replace("""                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">À propos de vous <span class="text-slate-400 font-normal normal-case">(optionnel)</span></label>""", location_step1)


# 3. Update Step 2 location to company_province_id and company_city
content = content.replace('wire:model="province_id"', 'wire:model="company_province_id"')
content = content.replace("@error('province_id')", "@error('company_province_id')")
content = content.replace('wire:model="city"', 'wire:model="company_city"')
content = content.replace("@error('city')", "@error('company_city')")

# Remove draft UI logic if present.
# Since we replaced the draft screen check in Livewire component to just render the normal form
# We can remove the draft screen from the view. Or it just won't be shown since $showDraftScreen is false.
# But wait, in Register.php, I removed $showDraftScreen ! So it will crash if it's referenced in the view.
# Let's remove the @elseif($showDraftScreen) block entirely.

pattern = re.compile(r"\{\{-- ── ÉCRAN DE REPRISE DE BROUILLON ── --\}\}.*?\{\{-- ── FORMULAIRE NORMAL ── --\}\}\n\s*@else", re.DOTALL)
content = re.sub(pattern, "{{-- ── FORMULAIRE NORMAL ── --}}\n        @else", content)

# Oh wait, $showDraftScreen is not in my updated Register.php, so $showDraftScreen will throw Undefined variable.
# Let's make sure it's removed.

with open('resources/views/livewire/cohorts/register.blade.php', 'w') as f:
    f.write(content)

print("Blade file updated.")
