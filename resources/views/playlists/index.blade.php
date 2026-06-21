@extends('layouts.website', ['title' => 'Playlist Konten - Huacheng Building Materials'])

@section('content')
<section class="bg-hc-light py-14">
    <div class="hc-container">
        <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Konten / 内容</p>
        <h1 class="mt-4 text-4xl font-black tracking-tight text-hc-text">Playlist Konten</h1>
        <p class="mt-4 max-w-2xl text-base leading-8 text-hc-softText">
            Kumpulan konten video, promosi, dan dokumentasi Huacheng.
        </p>
    </div>
</section>

<section class="bg-white py-14">
    <div class="hc-container">
        @if($playlists->count())
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($playlists as $playlist)
                    @php
                        $embedUrl = $playlist->embed_url;
                        $videoUrl = $playlist->video_file_url;
                    @endphp

                    <article
                        class="overflow-hidden rounded-2xl border border-hc-line bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-soft"
                        data-inline-playlist-card
                    >
                        <div class="relative">
                            <div
                                class="relative h-[230px] overflow-hidden rounded-t-2xl bg-slate-950"
                                data-inline-playlist-preview
                            >
                                <img
                                    src="{{ $playlist->thumbnail_url }}"
                                    alt="{{ $playlist->title }}"
                                    class="h-full w-full object-cover"
                                >

                                <button
                                    type="button"
                                    class="group absolute inset-0 block w-full text-left"
                                    data-inline-playlist-trigger
                                    data-embed-url="{{ $embedUrl }}"
                                    data-watch-url="{{ $playlist->url }}"
                                    data-video-url="{{ $videoUrl }}"
                                    data-platform="{{ $playlist->platform ?: 'Konten' }}"
                                    data-title="{{ $playlist->title }}"
                                >
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/55 via-slate-950/10 to-transparent"></div>

                                    <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="inline-flex h-[58px] w-[58px] items-center justify-center transition duration-300 group-hover:scale-105">
                                        <svg class="h-full w-full drop-shadow-[0_10px_24px_rgba(2,132,199,0.35)]" viewBox="0 0 220 220" fill="none" aria-hidden="true">
                                            <defs>
                                                <linearGradient id="hcPlayGradient" x1="40" y1="35" x2="178" y2="184" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0%" stop-color="#22B8F2"/>
                                                    <stop offset="48%" stop-color="#1682D4"/>
                                                    <stop offset="100%" stop-color="#1E3A9A"/>
                                                </linearGradient>
                                            </defs>
                                            <path
                                                d="M61 47
                                                   C61 37 69 29 79 29
                                                   C82 29 86 30 89 32
                                                   L170 82
                                                   C191 95 191 125 170 138
                                                   L89 188
                                                   C76 196 61 187 61 172
                                                   L61 135
                                                   L103 110
                                                   L61 85
                                                   Z"
                                                fill="url(#hcPlayGradient)"
                                            />
                                            <path
                                                d="M61 85
                                                   L103 110
                                                   L61 135
                                                   Z"
                                                fill="#1689D6"
                                                opacity="0.92"
                                            />
                                        </svg>
                                    </span>
                                </div>
                                </button>
                            </div>

                            <div
                                class="hidden rounded-t-2xl bg-slate-950 p-2.5"
                                data-inline-playlist-player-shell
                            >
                                <div class="relative overflow-hidden rounded-xl bg-black">
                                    <button
                                        type="button"
                                        class="absolute right-3 top-3 z-10 inline-flex h-9 w-9 items-center justify-center rounded-full bg-black/55 text-lg font-bold text-white backdrop-blur transition hover:bg-black/75"
                                        data-inline-playlist-close
                                        aria-label="Tutup player"
                                    >
                                        ×
                                    </button>

                                    <div
                                        class="w-full overflow-hidden rounded-xl"
                                        style="aspect-ratio: 16 / 9;"
                                        data-inline-playlist-player-wrap
                                    >
                                        <iframe
                                            src=""
                                            title="{{ $playlist->title }}"
                                            class="hidden h-full w-full rounded-xl"
                                            data-inline-playlist-iframe
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen
                                            referrerpolicy="strict-origin-when-cross-origin"
                                        ></iframe>

                                        <video
                                            class="hidden h-full w-full rounded-xl bg-black object-contain"
                                            data-inline-playlist-video
                                            controls
                                            playsinline
                                        ></video>

                                        <div
                                            class="hidden h-full w-full flex-col items-center justify-center rounded-xl bg-slate-950 px-6 py-8 text-center"
                                            data-inline-playlist-fallback
                                        >
                                            <h4 class="text-xl font-black text-white">
                                                Konten tidak tersedia
                                            </h4>

                                            <p class="mt-3 max-w-xs text-sm leading-7 text-white/70">
                                                Silakan buka konten dari platform aslinya.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            @if($playlist->platform)
                                <p class="text-xs font-bold uppercase tracking-[0.18em] text-hc-primary">{{ $playlist->platform }}</p>
                            @endif

                            <h2 class="mt-3 text-xl font-bold leading-snug text-hc-text">
                                {{ $playlist->title }}
                            </h2>

                            @if($playlist->title_zh)
                                <p class="mt-1 text-base font-semibold text-hc-primary">{{ $playlist->title_zh }}</p>
                            @endif

                            @if($playlist->description)
                                <p class="mt-4 text-sm leading-7 text-hc-softText">
                                    {{ $playlist->description }}
                                </p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">{{ $playlists->links() }}</div>
        @else
            <div class="rounded-2xl border border-dashed border-hc-line bg-hc-bg p-10 text-center">
                <h2 class="text-2xl font-bold text-hc-text">Belum ada playlist aktif</h2>
                <p class="mt-3 text-hc-softText">Input playlist dari admin dan aktifkan statusnya.</p>
            </div>
        @endif
    </div>
</section>

@include('partials.content-playlist-inline-script')
@endsection
