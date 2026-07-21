@props(['cohort', 'currentStep'])

@php
    $totalSteps = 4;
    $stepLabels = [1 => 'Entrepreneur', 2 => 'Entreprise', 3 => 'Documents', 4 => 'Projet'];
    $stepIcons = [
        1 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>',
        2 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
        3 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
        4 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
    ];
@endphp

<div class="bg-slate-900 sticky top-0 z-[60] border-b border-slate-800 mb-8 h-20 flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center justify-between gap-4">
        <a href="{{ route('cohorts.show', $cohort) }}" wire:navigate
           class="flex items-center gap-2 text-slate-400 hover:text-white transition-colors text-sm font-medium group flex-shrink-0">
            <div class="w-7 h-7 rounded-full bg-white/5 group-hover:bg-white/10 flex items-center justify-center transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </div>
            <span class="hidden sm:inline">{{ $cohort->name }}</span>
            <span class="sm:hidden">Retour</span>
        </a>

        {{-- Step indicator --}}
        <div class="flex items-center gap-3">
            @if(isset($stepLabels[$currentStep]))
                <span class="text-slate-500 text-xs hidden sm:inline flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $stepIcons[$currentStep] !!}</svg>
                    {{ $stepLabels[$currentStep] }}
                </span>
                <span class="text-slate-400 text-xs">{{ $currentStep }}/{{ $totalSteps }}</span>
            @endif
            <div class="flex gap-1.5">
                @for($i = 1; $i <= $totalSteps; $i++)
                    <div class="h-1.5 rounded-full transition-all duration-500
                        {{ $i < $currentStep ? 'w-6 bg-emerald-500' : ($i === $currentStep ? 'w-8 bg-emerald-400' : 'w-6 bg-slate-700') }}">
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
