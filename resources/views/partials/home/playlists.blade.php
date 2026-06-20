@if(($playlists ?? collect())->isNotEmpty())
<section class="bg-white py-16">
    <div class="hc-container">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Konten / 内容</p>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-hc-text sm:text-4xl">Playlist Konten</h2>
                <p class="mt-4 max-w-2xl text-base leading-8 text-hc-softText">
                    Konten video dan promosi dari admin akan tampil di bagian ini.
                </p>
            </div>

            <a href="{{ route('playlists.index') }}" data-hc-button-ready="1" class="inline-flex h-12 items-center justify-center rounded-full bg-hc-primary px-6 text-sm font-bold text-white shadow-soft transition hover:bg-hc-primaryDark">
                Lihat Playlist
            </a>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($playlists as $playlist)
                <article class="overflow-hidden rounded-[2rem] border border-hc-line bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-soft">
                    <a href="{{ $playlist->url }}" target="_blank" rel="noopener noreferrer" class="block">
                        <div class="aspect-video bg-hc-bg">
                            <img src="{{ $playlist->thumbnail_url }}" alt="{{ $playlist->title }}" class="h-full w-full object-cover">
                        </div>
                    </a>

                    <div class="p-6">
                        @if($playlist->platform)
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-hc-primary">{{ $playlist->platform }}</p>
                        @endif

                        <h3 class="mt-3 text-xl font-bold leading-snug text-hc-text">{{ $playlist->title }}</h3>

                        @if($playlist->title_zh)
                            <p class="mt-1 text-base font-semibold text-hc-primary">{{ $playlist->title_zh }}</p>
                        @endif

                        @if($playlist->description)
                            <p class="mt-4 line-clamp-3 text-sm leading-6 text-hc-softText">{{ $playlist->description }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
