<div class="bg-white min-h-screen py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('blog.index') }}" wire:navigate class="text-slate-500 hover:text-emerald-600 transition flex items-center gap-2 mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Retour aux actualités
            </a>
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 leading-tight">
                {{ $post->title }}
            </h1>
            <div class="flex items-center gap-4 text-slate-500 text-sm border-b border-slate-100 pb-8">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    {{ $post->published_at->format('d M Y') }}
                </span>
                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                <span>Hazina Mining Hub</span>
            </div>
        </div>

        @if($post->image)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-auto">
            </div>
        @endif

        <div class="prose prose-lg prose-slate prose-headings:text-slate-900 prose-a:text-emerald-600 hover:prose-a:text-emerald-500">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
</div>
