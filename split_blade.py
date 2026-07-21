import re
import os

with open('resources/views/livewire/cohorts/register.blade.php', 'r') as f:
    content = f.read()

# Extract success screen
success_match = re.search(r"\{\{-- ── ÉCRAN DE SUCCÈS ── --\}\}(.*?)\{\{-- ── FORMULAIRE NORMAL ── --\}\}", content, re.DOTALL)
if success_match:
    success_html = success_match.group(1).replace('@if($isSubmitted)', '').strip()
    with open('resources/views/livewire/cohorts/register/success.blade.php', 'w') as f:
        f.write('<div class="bg-slate-50 min-h-screen py-10">\n')
        f.write('    @include("livewire.cohorts.register.header", ["currentStep" => 4, "cohort" => $cohort])\n')
        f.write('    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">\n')
        f.write('        ' + success_html + '\n')
        f.write('    </div>\n</div>\n')

# Extract forms
form_match = re.search(r"<form wire:submit=\"submit\" class=\"space-y-5\">(.*?)</form>", content, re.DOTALL)
if form_match:
    forms_content = form_match.group(1)
    
    # Split by step markers
    step1 = re.search(r"\{\{-- ─────────────────────────────────────────\n                 STEP 1 : Entrepreneur\n            ───────────────────────────────────────── --\}\}\n            @if\(\$currentStep == 1\)(.*?)@endif", forms_content, re.DOTALL).group(1)
    step2 = re.search(r"\{\{-- ─────────────────────────────────────────\n                 STEP 2 : Entreprise\n            ───────────────────────────────────────── --\}\}\n            @if\(\$currentStep == 2\)(.*?)@endif", forms_content, re.DOTALL).group(1)
    step3 = re.search(r"\{\{-- ─────────────────────────────────────────\n                 STEP 3 : Documents Légaux\n            ───────────────────────────────────────── --\}\}\n            @if\(\$currentStep == 3\)(.*?)@endif", forms_content, re.DOTALL).group(1)
    step4 = re.search(r"\{\{-- ─────────────────────────────────────────\n                 STEP 4 : Motivation & Projet\n            ───────────────────────────────────────── --\}\}\n            @if\(\$currentStep == 4\)(.*?)@endif", forms_content, re.DOTALL).group(1)
    
    def write_step(step_num, title, subtitle, svg, form_content, buttons_content):
        with open(f'resources/views/livewire/cohorts/register/step{step_num}.blade.php', 'w') as f:
            f.write('<div class="bg-slate-50 min-h-screen">\n')
            f.write(f'    @include("livewire.cohorts.register.header", ["currentStep" => {step_num}, "cohort" => $cohort])\n')
            f.write('    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">\n')
            f.write('        <div class="mb-8">\n            <div class="flex items-center gap-4">\n                <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center shadow-sm flex-shrink-0">\n')
            f.write(f'                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">{svg}</svg>\n')
            f.write('                </div>\n                <div>\n')
            f.write(f'                    <h1 class="text-2xl font-black text-slate-900">{title}</h1>\n')
            f.write(f'                    <p class="text-slate-500 text-sm mt-0.5">{subtitle}</p>\n')
            f.write('                </div>\n            </div>\n        </div>\n')
            f.write('        <form wire:submit="nextStep" class="space-y-5">\n')
            if step_num == 4:
                f.write('        <form wire:submit="submit" class="space-y-5">\n')
            f.write(form_content)
            f.write('\n        <div class="pt-6 mt-8 border-t border-slate-200 flex items-center justify-between gap-4">\n')
            if step_num > 1:
                f.write('            <button type="button" wire:click="previousStep" class="px-6 py-3 rounded-full font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">Retour</button>\n')
            else:
                f.write('            <div></div>\n')
            f.write(f'            <button type="submit" class="flex items-center gap-2 px-8 py-3 rounded-full font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-lg shadow-emerald-600/20">\n                {buttons_content}\n            </button>\n')
            f.write('        </div>\n')
            f.write('        </form>\n    </div>\n</div>\n')

    # Step SVGs
    svg1 = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>'
    svg2 = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>'
    svg3 = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>'
    svg4 = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>'

    write_step(1, "L'Entrepreneur", "Parlez-nous de vous et de votre parcours", svg1, step1, 'Suivant <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>')
    write_step(2, "L'Entreprise", "Votre structure, vos activités et votre marché", svg2, step2, 'Suivant <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>')
    write_step(3, "Documents Légaux", "Attestez la formalisation de votre entreprise", svg3, step3, 'Suivant <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>')
    write_step(4, "Motivation & Projet", "Votre vision, votre impact et vos ambitions", svg4, step4, 'Soumettre ma candidature <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>')

print("Templates split successfully.")
