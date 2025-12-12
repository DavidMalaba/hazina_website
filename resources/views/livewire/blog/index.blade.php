<div class="bg-slate-50 min-h-screen py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-slate-900 mb-4">Actualités & Insights</h1>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                Restez informé des dernières évolutions du secteur minier et des activités du Hub.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <a href="{{ route('blog.show', $post) }}" wire:navigate class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition">
                    <div class="aspect-video bg-slate-200 relative overflow-hidden">
                        @if($post->image)
                            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 bg-emerald-600 text-slate-900 text-xs font-bold px-3 py-1 rounded-full">
                            Article
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-slate-500 mb-3">
                            {{ $post->published_at->format('d M Y') }}
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition">
                            {{ $post->title }}
                        </h2>
                        <p class="text-slate-600 line-clamp-3">
                            {{ Str::limit(strip_tags($post->content), 150) }}
                        </p>
                        <div class="mt-4 flex items-center text-emerald-600 font-medium">
                            Lire la suite
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>
