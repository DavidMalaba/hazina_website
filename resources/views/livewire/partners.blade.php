<div class="bg-white min-h-screen py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-slate-900 mb-4">Nos Partenaires</h1>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                Ils nous font confiance et contribuent à bâtir un écosystème minier fort.
            </p>
        </div>

        <div class="space-y-16">
            @foreach($partnersGrouped as $category => $partners)
            <div>
                <h2 class="text-2xl font-bold text-slate-900 mb-8 border-l-4 border-emerald-500 pl-4">{{ $categoryNames[$category] ?? $category }}</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    @foreach($partners as $partner)
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-xl border border-slate-100 hover:shadow-md transition">
                        @php
                            $content = $partner->logo 
                                ? '<img src="'.asset('storage/'.$partner->logo).'" alt="'.$partner->name.'" class="max-h-12 object-contain grayscale hover:grayscale-0 transition duration-300">'
                                : '<span class="text-xl font-bold text-slate-400 hover:text-emerald-600 transition">'.$partner->name.'</span>';
                        @endphp
                        
                        @if($partner->website)
                            <a href="{{ str_starts_with($partner->website, 'http') ? $partner->website : 'https://'.$partner->website }}" target="_blank" rel="noopener noreferrer">
                                {!! $content !!}
                            </a>
                        @else
                            {!! $content !!}
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-20 bg-emerald-900 rounded-3xl p-12 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Devenir Partenaire</h2>
            <p class="text-emerald-100 mb-8 max-w-2xl mx-auto">
                Vous souhaitez rejoindre notre réseau et contribuer au développement du secteur minier congolais ?
            </p>
            <a href="{{ route('become-partner') }}" wire:navigate class="inline-flex justify-center items-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-emerald-900 bg-white hover:bg-emerald-50 transition">
                Devenir Partenaire
            </a>
        </div>
    </div>
</div>
