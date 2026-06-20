@php
    $playlistItems = $playlists ?? collect();
    $visiblePlaylists = $playlistItems->take(3);
    $hasMorePlaylists = $playlistItems->count() > 3;
@endphp

@if($playlistItems->isNotEmpty())
<section class="bg-white py-16">
    <div class="hc-container">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Konten / 内容</p>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-hc-text sm:text-4xl">Playlist Konten</h2>
            </div>

            @if($hasMorePlaylists)
                <a href="{{ route('playlists.index') }}" class="button hc-section-head-cta">
                    <span>Lihat Selengkapnya / 查看更多</span>
                </a>
            @endif
        </div>

        <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($visiblePlaylists as $playlist)
                <article class="hc-uniform-card overflow-hidden rounded-[2rem] border border-hc-line bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-soft">
                    <a href="{{ $playlist->url }}" target="_blank" rel="noopener noreferrer" class="block">
                        <div class="hc-uniform-card-media">
                            <img src="{{ $playlist->thumbnail_url }}" alt="{{ $playlist->title }}" class="h-full w-full object-cover">
                        </div>
                    </a>

                    <div class="hc-uniform-card-body p-6">
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

@if($hasMorePlaylists)
            <div class="hc-section-bottom-cta">
                <a href="{{ route('playlists.index') }}" class="button">
                    <span>Lihat Selengkapnya / 查看更多</span>
                </a>
            </div>
        @endif
    </div>
</section>
@endif
